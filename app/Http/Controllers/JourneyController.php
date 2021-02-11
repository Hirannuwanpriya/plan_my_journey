<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Journey $journey
     * @return \Illuminate\Http\Response
     */
    public function show(Journey $journey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Journey $journey
     * @return \Illuminate\Http\Response
     */
    public function edit(Journey $journey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Journey $journey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journey $journey)
    {
        //
    }
}
