<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Instrument;
use App\Models\Reservation;
use App\Models\Category;

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
    public function userPage(){

        $users = User::paginate(10);

        return view('admin.user.userEntries', compact('users'));
    }
    
    public function userCreatePage(){
        return view('admin.user.userCreate');
    }

    public function userEditPage(){
        return view('admin.user.userEdit');
    }
    
}
