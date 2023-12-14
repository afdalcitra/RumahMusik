<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /* MOVE PAGE */
    public function myProfilePage(){
        return view('user.viewProfile');
    }

    public function myReservationPage(){
        return view('user.viewReservation');
    }
}
