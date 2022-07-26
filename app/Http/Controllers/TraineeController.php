<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('trainees.index', [
            'trainees' => auth()->user()->trainees()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('trainees.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'dob'           => 'required|before:today',
        ]);

        $trainee = Trainee::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'dob'           => $request->dob,
            'user_id'       => auth()->user()->id,
        ]);
        $trainee->save();

        return redirect()->route('trainees.index')->with('status', 'Trainee created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Trainee $trainee)
    {
        return view('trainees.form', [
            'trainee' => $trainee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Trainee $trainee)
    {
        return view('trainees.form', [
            'trainee' => $trainee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Trainee $trainee)
    {
        $request->validate([
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'dob'           => 'required|before:today',
        ]);

        $trainee->fill([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'dob'           => $request->dob,
            'user_id'       => auth()->user()->id,
        ]);
        $trainee->save();

        return redirect()->route('trainees.index')->with('status', 'Trainee created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainee $trainee)
    {
        //
    }
}
