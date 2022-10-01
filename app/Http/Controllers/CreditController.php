<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;

class CreditController extends Controller
{
    public function purchase(Request $request)
    {
        try {
            $stripeCharge = $request->user()->charge(
                100, $request->paymentMethodId
            );
        } catch (IncompletePayment $e) {

        }
    }
}
