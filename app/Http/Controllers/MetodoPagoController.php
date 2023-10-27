<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MetodoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->ok(MetodoPago::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MetodoPago $metodo)
    {
        return response()->ok($metodo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetodoPago $metodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetodoPago $metodo)
    {
        //
    }
}
