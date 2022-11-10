<?php

namespace App\Http\Controllers;

use App\Exceptions\NegativeCreditException;
use App\Models\Trainee;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
//use Laravel\Cashier\Exceptions\IncompletePayment;

class CreditController extends Controller
{
    /**
     * Add the specified number of credits to the specified trainee
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $trainee = Trainee::findOrFail($request->trainee_id);

        // Add the specified amount of credit
        $trainee->addCredit($request->amount);

        // Record the transaction with the authenticated user as the admin actor
        Transaction::create([
            'net'           => $request->amount,
            'trainee_id'    => $trainee->id,
            'admin_id'      => auth()->user()->id
        ]);

        return redirect()->back()->with(['status' => $request->amount . ' credits added!']);
    }

    /**
     * Set the specified trainee's credit value directly
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function set(Request $request)
    {
        $trainee = Trainee::findOrFail($request->trainee_id);

        $diff = $request->amount - $trainee->credit;

        if ($diff >= 0) {
            // Add credit if diff is +ve
            $trainee->addCredit($diff);
        } else {
            // Try to take away credit if diff is -ve, failing if balance would go <0
            try {
                $trainee->chargeCredit(-$diff);
            } catch (NegativeCreditException $e) {
                return redirect()
                    ->back()
                    ->withErrors('Credit amount can not be set to a negative number.');
            }
        }

        // Record the transaction with the authenticated user as the admin actor
        Transaction::create([
            'net'           => $diff,
            'trainee_id'    => $trainee->id,
            'admin_id'      => auth()->user()->id
        ]);

        return redirect()->back()->with(['status' => 'New balance of '. $trainee->credit . ' set!']);
    }

    /**
     * Charge the trainee the specified amount to add the specified number of credits
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    /**public function purchase(Request $request)
    {
        try {
            $stripeCharge = $request->user()->charge(
                100, $request->paymentMethodId
            );
        } catch (IncompletePayment $e) {

        }
    }**/
}
