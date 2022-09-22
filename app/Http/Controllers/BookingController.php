<?php

namespace App\Http\Controllers;

use App\Exceptions\SessionBookingException;
use App\Models\Session;
use App\Models\Trainee;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Book the specified trainee, or the authenticated user, into the session
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Session $session
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function book(Request $request, Session $session)
    {
        try {
            // If the 'book' parameter is set, book the given trainee. Otherwise, book the authenticated user
            $request->book > -1 ?
                $session->bookTrainee(Trainee::findOrFail($request->book)) :
                $session->bookUser(auth()->user());
        } catch (SessionBookingException $e) {
            // Display error message
            return redirect()->back()->withErrors($e->getMessage());
        }

        // Take them back to the dashboard
        return redirect()->route('dashboard')->with([
            'status' => 'Successfully booked in '. $request->book ? $request->book : auth()->user()->id . ' to ' . $session->time
        ]);
    }
}
