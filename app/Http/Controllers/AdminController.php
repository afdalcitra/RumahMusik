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
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    /* ======================== MOVE PAGE ======================== */
    public function dashboardPage(){

        $userCount = User::count();
        $categoryCount = Category::count();
        $instrumentCount = Instrument::count();
        $reservationCount = Reservation::count();
        
        return view('admin.dashboard', compact('userCount', 'categoryCount', 'instrumentCount', 'reservationCount'));
    }

    /* ======================== ADMIN-CATEGORY ======================== */
    public function categoryPage(Request $request){

        $search = $request->input('search');
        $categories = Category::where('name', 'like', '%' . $search . '%')->paginate(10);

        return view('admin.categories.categoriesEntries', compact('categories'));
    }

    public function categoryCreatePage(){
        return view('admin.categories.categoriesCreate');
    }

    public function categoryEditPage($id){
        // Find the category by ID
        $category = Category::find($id);
    
        // Pass the category data to the view
        return view('admin.categories.categoriesEdit', compact('category'));
    }

    //CREATE CATEGORY
    public function createCategory(Request $request)
    {
        // Validate form data
        $request->validate([
            'category' => 'required',
        ]);

        // Create a new category

        try {

            $category = Category::create([
                'name' => $request->input('category'),
            ]);

            Session::flash('success', 'New category created successfully');
            
        } catch (\Exception $e) {
            
            Session::flash('error', 'Error creating new category');

        }

        // Redirect to the user page or any other page as needed
        return redirect()->route('categoryPage');
    }

    //EDIT CATEGORY
    public function updateCategory(Request $request, $id)
    {
        // Validate form data
        $request->validate([
            'category' => 'required',
        ]);

        try {
            // Find the category by ID
            $category = Category::find($id);
    
            // Update category data
            $categoryData = [
                'name' => $request->input('category'),
            ];
    
            // Only update the password if it's provided
            if ($request->filled('password')) {
                $categoryData['password'] = bcrypt($request->input('password'));
            }
    
            $category->update($categoryData);
    
            Session::flash('success', 'Category updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', 'Error updating category');
        }
    
        return redirect()->route('categoryPage');
    }

    //SEARCH CATEGORY
    public function categorySearch(Request $request)
    {
        // Redirect to the userPage method with the search query
        return $this->categoryPage($request);
    }

    //DELETE CATEGORY
    public function categoryDelete($id){

        try{
            Category::destroy($id);
            Session::flash('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            Session::flash('error', 'Error deleting category');
        }

        return redirect()->route('categoryPage');

    }

    /* ======================== ADMIN-INSTRUMENT ======================== */
    public function instrumentPage(Request $request){

        $search = $request->input('search');
        $instruments = Instrument::where('name', 'like', '%' . $search . '%')->paginate(10);

        return view('admin.instrument.instrumentEntries', compact('instruments'));
        
    }

    public function instrumentCreatePage(){
        return view('admin.instrument.instrumentCreate');
    }

    public function instrumentEditPage($id){

        // Find the category by ID
        $instrument = Instrument::find($id);
    
        // Pass the category data to the view
        return view('admin.instrument.instrumentEdit', compact('instrument'));

    }

    //CREATE INSTRUMENT
    public function createInstrument(Request $request)
    {
        // Validate form data
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'price' => 'required',
            'images' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // add validation for image files
            'description' => 'required',
        ]);

        try {
            // Create a new instrument with the provided attributes
            $instrument = Instrument::create([
                'code' => $request->input('code'),
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
            ]);
        
            // Check if a new file was uploaded
            if ($request->hasFile('images')) {
                // Get the file from the request
                $file = $request->file('images');
        
                // Generate a unique filename
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
                // Move the file to the storage directory
                $file->move(public_path('images'), $fileName);
        
                // Update the instrument with the new file name
                $instrument->image = $fileName;
                $instrument->save();
        
                // Log success message
                Log::info('Instrument image uploaded successfully. Filename: ' . $fileName);
            }
        
            Session::flash('success', 'Instrument created successfully');
        } catch (\Exception $e) {
            // Log the detailed error message
            Log::error('Error creating instrument: ' . $e->getMessage());
        
            // Flash a generic error message
            Session::flash('error', 'Error creating instrument. Please check the logs for more details.');
        }

        return redirect()->route('instrumentPage');
    }

    //SEARCH INSTRUMENT
    public function instrumentSearch(Request $request)
    {
        // Redirect to the userPage method with the search query
        return $this->instrumentPage($request);
    }


    //EDIT INSTRUMENT
    public function updateInstrument(Request $request, $id)
    {
        // Validate form data
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'price' => 'required',
            'images' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // add validation for image files
            'description' => 'required',
        ]);

        try {
            // Find the instrument by ID
            $instrument = Instrument::find($id);

            // Update instrument data
            $instrument->code = $request->input('code');
            $instrument->name = $request->input('name');
            $instrument->price = $request->input('price');
            $instrument->description = $request->input('description');

            // Check if a new file was uploaded
            if ($request->hasFile('images')) {
                // Get the file from the request
                $file = $request->file('images');

                // Generate a unique filename
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Move the file to the storage directory
                $file->move(public_path('images'), $fileName);

                // Delete the old image (optional)
                if ($instrument->images) {
                    $existingImagePath = public_path('images') . '/' . $instrument->images;
                    if (file_exists($existingImagePath)) {
                        unlink($existingImagePath);
                    }
                }

                // Update the instrument with the new file name
                $instrument->image = $fileName;
            }

            $instrument->save();

            Session::flash('success', 'Instrument updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', 'Error updating instrument');
        }

        return redirect()->route('instrumentPage');
    }


    //DELETE INSTRUMENT
    public function instrumentDelete($id){

        try{
            Instrument::destroy($id);
            Session::flash('success', 'Instrument deleted successfully');
        } catch (\Exception $e) {
            Session::flash('error', 'Error deleting instrument');
        }

        return redirect()->route('instrumentPage');

    }

    /* ======================== ADMIN-RESERVATION ======================== */
    public function reservationPage(){
        return view('admin.peminjaman.reservationEntries');
    }

    /* ======================== ADMIN-USER ======================== */
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
