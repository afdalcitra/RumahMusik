<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Instrument;
use App\Models\Reservation;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /* MOVE PAGE */
    public function dashboardPage(){

        $userCount = User::count();
        $categoryCount = Category::count();
        $instrumentCount = Instrument::count();
        $reservationCount = Reservation::count();
        
        return view('admin.dashboard', compact('userCount', 'categoryCount', 'instrumentCount', 'reservationCount'));
    }

    /* ADMIN-CATEGORY */
    public function categoryPage(){

        $categories = Category::paginate(10);

        return view('admin.categories.categoriesEntries', compact('categories'));
    }

    public function categoryCreatePage(){
        return view('admin.categories.categoriesCreate');
    }

    public function categoryEditPage(){
        return view('admin.categories.categoriesEdit');
    }

    /* ADMIN-INSTRUMENT */
    public function instrumentPage(){
        return view('admin.instrument.instrumentEntries');
    }

    public function instrumentCreatePage(){
        return view('admin.instrument.instrumentCreate');
    }

    public function instrumentEditPage(){
        return view('admin.instrument.instrumentEdit');
    }

    /* ADMIN-RESERVATION */
    public function reservationPage(){
        return view('admin.peminjaman.reservationEntries');
    }

    /* ADMIN-USER */
    public function userPage(Request $request){

        $search = $request->input('search');
        // Query to get users based on the search query
        $users = User::where('username', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%')
        ->paginate(10);

        return view('admin.user.userEntries', compact('users'));
    }
    
    public function userCreatePage(){
        return view('admin.user.userCreate');
    }

    public function userEditPage($id){

        $user = User::find($id);

        return view('admin.user.userEdit', compact('user'));
    }


    //CREATE USER
    public function createUser(Request $request)
    {
        // Validate form data
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confPassword' => 'required|same:password',
            'role' => 'required|in:user,admin', // Validate role input
        ]);

        // Create a new user

        try {

            $user = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'is_admin' => $request->input('role') === 'admin',
            ]);

            Session::flash('success', 'New user created successfully');
            
        } catch (\Exception $e) {
            
            Session::flash('error', 'Error creating new user');

        }

        // Redirect to the user page or any other page as needed
        return redirect()->route('userPage');
    }

    //EDIT USER
    public function updateUser(Request $request, $id)
    {
        // Validate form data
        $request->validate([
            'username' => ['required', Rule::unique('users', 'username')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],
            'password' => 'nullable|min:8',
            'role' => 'required|in:user,admin',
        ]);

        try {
            // Find the user by ID
            $user = User::find($id);
    
            // Update user data
            $userData = [
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'is_admin' => $request->input('role') === 'admin',
            ];
    
            // Only update the password if it's provided
            if ($request->filled('password')) {
                $userData['password'] = bcrypt($request->input('password'));
            }
    
            $user->update($userData);
    
            Session::flash('success', 'User updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', 'Error updating user');
        }
    
        return redirect()->route('userPage');
    }

    //SEARCH USER
    public function userSearch(Request $request)
    {
        // Redirect to the userPage method with the search query
        return $this->userPage($request);
    }

    //DELETE USER
    public function userDelete($id){

        try {
            // Logic to delete the user by ID
            User::destroy($id);

            // Flash a success message to the session
            Session::flash('success', 'User deleted successfully');
        } catch (\Exception $e) {
            // If an exception occurs during deletion, flash an error message
            Session::flash('error', 'Error deleting user');
        }
    
        return redirect()->route('userPage');
    }
    
}
