<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Valoration;
use Illuminate\Http\Request;

class ValorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $valoracion = new Valoration;

        $valoracion->commentary = $request->commentary;
        $valoracion->stars = $request->stars;
        //$valoracion->id_user_emissor = $request->user()->id;
        $valoracion->id_user_emissor=3;
        $valoracion->id_user_receptor = $request->id_user_receptor;
        $valoracion->save();

        return response()->json($valoracion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Valoration  $valoration
     * @return \Illuminate\Http\Response
     */
    public function show(Valoration $valoration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Valoration  $valoration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valoration $valoration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Valoration  $valoration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valoration $valoration)
    {
        //
    }
}
