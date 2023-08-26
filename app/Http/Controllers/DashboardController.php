<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Patente;
use App\Models\Productor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $no_productores = count(Productor::all());
        $ultimosProductores = Productor::orderBy('id','desc')->take(3)->get();
        $no_patentes = count(Patente::all());
        $ultimasPatentes = Patente::orderBy('id','desc')->take(3)->get();
        $no_ventas_mes = Count(Venta::all());
        $ultimasVentas = Venta::orderBy('id','desc')->take(3)->get();
        return view('dashboard',
            ['no_productores'=>$no_productores,'ultimosProductores'=>$ultimosProductores,'no_patentes'=>$no_patentes,'ultimasPatentes'=>$ultimasPatentes,'no_ventas_mes'=>$no_ventas_mes,'ultimasVentas'=>$ultimasVentas],
        );
    }
}
