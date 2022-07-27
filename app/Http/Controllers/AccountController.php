<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    /**
     * Display the authenticated user's account.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showOwn()
    {
        return view('accounts.show', auth()->user());
    }

    /**
     * Update the specified account.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        if (! Hash::check($request->current_password, $user->password)) {
            return redirect()->route('account.own')->withErrors(['Your password was incorrect.']);
        }

        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'dob'           => 'required|before:today',
        ]);
        $user->fill([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'dob'           => $request->dob,
        ]);

        if ($request->new_password) {
            $request->validate([
                'new_password' => ['required', 'confirmed', Password::defaults()]
            ]);
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('account.own')->with(['status' => 'Your account was updated.']);
    }
}
