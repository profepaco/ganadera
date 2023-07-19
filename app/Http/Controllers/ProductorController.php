<?php

namespace App\Http\Controllers;

use App\Models\Productor;
use Illuminate\Http\Request;

class ProductorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('productores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productores.create');
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
    public function show(Productor $productore)
    {
        return view('productores.show',['productor'=>$productore]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productor $productore)
    {
        return view('productores.edit',['productor'=>$productore]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productor $productor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productor $productor)
    {
        //
    }
}
