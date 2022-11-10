<?php

namespace App\Http\Controllers;

use App\Exceptions\NegativeCreditException;
use App\Exceptions\SessionBookingException;
use App\Models\Session;
use App\Models\Trainee;
use App\Models\Transaction;
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
//            if ($request->book == -1) { // Booking the authenticated user
//                $session->bookUser(auth()->user());
//            } else {
                // Book the specified trainee
                $trainee = Trainee::findOrFail($request->book);
                $session->bookTrainee($trainee);

                // Charge the trainee
                $trainee->chargeCredit($session->cost);
                Transaction::create([
                    'net'           => -$session->cost,
                    'session_id'    => $session->id,
                    'trainee_id'    => $trainee->id
                ]);
//            }
        } catch (SessionBookingException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } catch (NegativeCreditException $e) {
            return redirect()->back()->withErrors('You do not have enough credit for this session.');
        }

        // Take them back to the dashboard
        return redirect()->route('dashboard')->with([
            'status' => 'Successfully booked in '. $trainee->first_name . ' ' . $trainee->last_name . ' on ' . $session->time->format('D j M') . '.'
        ]);
    }
}
