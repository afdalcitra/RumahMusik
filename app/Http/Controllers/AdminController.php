<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Instrument;
use App\Models\Reservation;

class AdminController extends Controller
{
    /* MOVE PAGE */
    public function dashboardPage(){
        return view('admin.dashboard');
    }

    /* ADMIN-CATEGORY */
    public function categoryPage(){
        return view('admin.categories.categoriesEntries');
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
    public function userPage(){
        return view('admin.user.userEntries');
    }
    
    public function userCreatePage(){
        return view('admin.user.userCreate');
    }

    public function userEditPage(){
        return view('admin.user.userEdit');
    }



}
