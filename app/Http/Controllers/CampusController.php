<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Campus::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuevo_campus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campus = Campus::create($request->all());

        return response()->json($campus,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        return $campus;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        return view('editar_campus');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        $campus->update($request->all());

        return response()->json($campus,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        $campus->delete();

        return response()->json(null,204);
    }
}
