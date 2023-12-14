<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Instrument;
use App\Models\Reservation;

class AuthController extends Controller
{
    //User Landing Handle

    public function landHandling(){

        $user = Auth::user();

        $user = auth() -> user();

        if ($user){
            $role = $user->is_admin;

            if ($role == 1) {
                return redirect('/admin/dashboard');
            } else if ($role == 0) {
                return redirect('/homepage');
            }
        }

        return redirect('/login');

    }

    /* LOGIN HANDLING */
    // Show Login Page
    public function loginPage(){
        return redirect('/register');
    }

    //Login Logic
    public function login(Request $request){
        $request->validate([
            'username'    => 'required|username',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Check user's role and redirect accordingly
            if ($user->role == 0) {
                return redirect('/homepage'); // Pass instruments to homepage view for customers
            } elseif ($user->role == 1) {
                return redirect('/admin/dashboard'); // Redirect to adminpage for admins
            }
        }
        // Authentication failed
        return back()->withErrors(['email' => 'Email atau Password yang anda masukkan salah!']);
    }

    /* REGISTER HANDLING */

    /* LOGOUT HANDLING */
}
