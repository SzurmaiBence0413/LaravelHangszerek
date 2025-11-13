<?php

namespace App\Http\Controllers;

use App\Models\instruments;
use App\Http\Requests\StoreinstrumentsRequest;
use App\Http\Requests\UpdateinstrumentsRequest;

class InstrumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreinstrumentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(instruments $instruments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateinstrumentsRequest $request, instruments $instruments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(instruments $instruments)
    {
        //
    }
}
