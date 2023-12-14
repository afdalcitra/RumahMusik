<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Instrument;
use App\Models\Reservation;

class AdminController extends Controller
{
    /* Move Page */
    public function dashboardPage(){
        return view('admin.dashboard');
    }

    public function homePage(){
        return view('user.home');
    }


}
