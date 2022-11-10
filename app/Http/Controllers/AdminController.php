<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    /**
     * Show all users
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Display the specified user.
     *
     * @param User $user
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user,
            'trainees' => $user->trainees
        ]);
    }

    /**
     * Display the specified trainee
     *
     * @param User $user
     * @param Trainee $trainee
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function trainee(User $user, Trainee $trainee)
    {
        return view('admin.users.trainee', [
            'trainee'       => $trainee,
            'transactions'  => $trainee->transactions()->latest()->paginate(5)
        ]);
    }
}
