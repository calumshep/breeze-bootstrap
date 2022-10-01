<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
