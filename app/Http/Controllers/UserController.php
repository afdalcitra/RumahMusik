<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Instrument;
use App\Models\Reservation;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


class UserController extends Controller
{
    /* ======================== MOVE PAGE ======================== */
    public function myProfilePage($id) {
        $user = User::find($id);
        return view('user.viewProfile', compact('user'));
    }

    public function myReservationPage(){
        return view('user.viewReservation');
    }

    public function viewReservation()
    {
        // Ambil data histori reservasi pengguna
        $user = auth()->user();
        $reservations = Reservation::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    
        return view('user.viewReservation', compact('reservations'));
    }

    public function viewHistory()
    {
        // Ambil data histori reservasi pengguna
        $user = auth()->user();
        $reservations = Reservation::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    
        return view('user.viewHistory', compact('reservations'));
    }

    /* ======================== USER MANAGEMENT ======================== */

    //UPDATE USERNAME & EMAIL

    public function updateProfile(Request $request, $id){

        // Validate form data
        $request->validate([
            'username' => ['required', Rule::unique('users', 'username')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],
        ]);

        try {
            // Find the user by ID
            $user = User::find($id);
    
            // Update user data
            $userData = [
                'username' => $request->input('username'),
                'email' => $request->input('email'),
            ];
 
            $user->update($userData);
    
            Session::flash('profile_success', 'User updated successfully');
        } catch (\Exception $e) {
            Session::flash('profile_error', 'Error updating user');
        }

        return redirect()->route('myProfilePage', ['id' => auth()->user()->id]);

    }

    //UPDATE PASSWORD
    public function updateSecurity(Request $request, $id){

        // Validate form data
        $request->validate([
            'currPassword' => 'nullable|min:8',
            'newPassword' => 'nullable|min:8',
            'confirmNewPassword' => 'nullable|min:8|same:newPassword',
        ]);

        try {
            // Find the user by ID
            $user = User::find($id);
            
            // Check if the entered current password is correct
            if (!Hash::check($request->input('currPassword'), $user->password)) {

                Session::flash('security_incorrect', 'Current password is incorrect!');
                return redirect()->route('myProfilePage', ['id' => auth()->user()->id])->with('error', 'Current password is incorrect');


        }
       
           // Only update the password if the new password is provided
            if ($request->filled('newPassword')) {
                $user->update([
                    'password' => bcrypt($request->input('newPassword')),
                ]);
            Session::flash('security_success', 'Password updated successfully');
        }
    
            Session::flash('security_success', 'Password updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', 'Error updating password');
        }

        return redirect()->route('myProfilePage', ['id' => auth()->user()->id]);

    }

    //DELETE USER
    public function deleteUser($id)
    {
        try {
            // Logic to delete the user by ID
            User::destroy($id);

            // Flash a success message to the session
            Session::flash('delete_success', 'User deleted successfully');
        } catch (\Exception $e) {
            // If an exception occurs during deletion, flash an error message
            Session::flash('delete_error', 'Error deleting user');
        }
    
        return redirect()->route('homePage');
    }

    /* ======================== USER RESERVATION ======================== */

    //CREATE RESERVATION
    public function createReservation(Request $request, $instrumentId)
    {
        // Validate form data
        $request->validate([
            'datepickerstart' => 'required|date',
            'datepickerend' => 'required|date',
        ]);

        // Check if the instrument is available (stock > 0)
        $instrument = Instrument::findOrFail($instrumentId);

        if ($instrument-> stock <= 0) {
            // Return an alert or redirect with an error message indicating that the instrument is out of stock
            Session::flash('empty_stock', 'Instrument is out of stock.');
            return redirect()->route('homePage');
        }

        try {

            // Find the instrument by ID
            $instrument = Instrument::findOrFail($instrumentId);

            // Calculate total price based on instrument price
            $totalPrice = $instrument->price;

            // Logic max 2 rent
            $rentChance = Reservation::where('user_id', auth()->user()->id)
                ->whereNull('tanggal_dikembalikan')
                ->count();

            if ($rentChance >= 2) {
                Session::flash('rent_max', 'Your rental capacity is at max! please return the unit first!');
                return redirect()->route('homePage')->with('danger', 'Anda sudah mencapai batas maksimal peminjaman senjata.');
            }

            // Create reservation
            
            Reservation::create([
                'user_id' => auth()->user()->id,
                'instrument_id' => $instrument->id, // Use the instrument ID obtained from the route parameter
                'tanggal_peminjaman' => Carbon::parse($request->input('datepickerstart')),
                'akhir_peminjaman' => Carbon::parse($request->input('datepickerend')),
                'total_price' => $totalPrice,
            ]);

            $instrument->stock -= 1;
            $instrument->save();

            
            // Flash a success message to the session
            Session::flash('reservation_success', 'Reservation created successfully');
        } catch (\Exception $e) {
            // If an exception occurs during reservation creation, flash an error message
            Session::flash('reservation_error', 'Error creating reservation');
            Log::error('Error creating reservation: ' . $e->getMessage());
        }
        return redirect()->route('homePage');
    }

    public function editReservation(Request $request, $reservationId)
    {
        // Validate form data
        $request->validate([
            'datepickerstart' => 'required|date',
            'datepickerend' => 'required|date',
        ]);

        try {

            // Find the reservation by ID
            $reservation = Reservation::find($reservationId);

            // Update reservation
            $reservation->tanggal_peminjaman = $request->input('datepickerstart');
            $reservation->akhir_peminjaman = $request->input('datepickerend');

            $reservation->save();

            // Flash a success message to the session
            Session::flash('reservation_update_success', 'Reservation successfully edited');
        } catch (\Exception $e) {
            // If an exception occurs during reservation creation, flash an error message
            Session::flash('reservation_update_error', 'Error editing reservation');
            Log::error('Error creating reservation: ' . $e->getMessage());
        }
        return redirect()->route('viewReservation');
    }

    public function cancelReservation($reservationIdid)
    {

        try {
            // Cari reservasi berdasarkan ID
            $reservation = Reservation::find($reservationIdid);
        
            // Periksa apakah reservasi ditemukan
            if (!$reservation) {
                return redirect()->back()->with('error', 'Reservasi tidak ditemukan');
            }

            // Retrieve the corresponding instrument
            $instrument = $reservation->instrument;

            // Increase the stock of the instrument by 1
            $instrument->stock += 1;
            $instrument->save();
        
            // Hapus reservasi
            $reservation->delete();
            Session::flash('reservation_cancel_success', 'Reservation successfully canceled');
        } catch (\Exception $e){
            Session::flash('reservation_cancel_success', 'Cancelling reservation failed');
        }
    
        return redirect()->route('viewReservation');
    }

    //PRINT RESERVATION
    public function generatePDF()
    {
        $user = auth()->user();
        $reservations = Reservation::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $pdf = PDF::loadView('user.pdf.history', compact('reservations'));

        return $pdf->download('reservation_history.pdf');
    }

}
