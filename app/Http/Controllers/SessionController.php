<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('sessions.index', [
            'sessions' => Session::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('sessions.form');
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
            'name'          => 'required|max:255',
            'date'          => 'required|after:today',
            'time'          => 'required',
            'cost'          => 'required',
            'description'   => 'required',
            'capacity'      => 'nullable',
        ]);

        $session = Session::create([
            'name'          => $request->name,
            'time'          => $request->date . " " . $request->time,
            'cost'          => $request->cost,
            'description'   => $request->description,
            'capacity'      => $request->capacity,
        ]);
        $session->save();

        return redirect()->route('sessions.index')->with('status', 'Session created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Session $session)
    {
        return view('sessions.form', [
            'session' => $session,
        ]);
    }

    /**
     * Display the session details for members.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view(Session $session)
    {
        return view('sessions.show', [
            'session' => $session,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Session $session)
    {
        return view('sessions.form', [
            'session' => $session,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Session $session)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'date'          => 'required|after:today',
            'time'          => 'required',
            'cost'          => 'required',
            'description'   => 'required',
            'capacity'      => 'nullable',
        ]);

        $session->fill([
            'name'          => $request->name,
            'date'          => $request->date,
            'time'          => $request->time,
            'cost'          => $request->cost,
            'description'   => $request->description,
            'capacity'      => $request->capacity,
        ]);

        $session->save();

        return redirect()->route('sessions.index')->with('status', 'Session update saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
