<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('productos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show',['producto'=>$producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit',['producto'=>$producto]);
    }

    
}
