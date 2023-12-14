<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Instrument;
use App\Models\Reservation;
use App\Models\Category;

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

    public function viewReservationHistory()
    {
        // Ambil data histori reservasi pengguna
        $user = auth()->user();
        $reservations = Reservation::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    
        return view('user.viewReservation', compact('reservations'));
    }
    


}
