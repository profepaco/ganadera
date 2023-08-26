<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use PDF;
class ReportesController extends Controller
{
    
    public function imprimirVenta(Venta $venta){
        $descuento = 0.0;
        if($venta->productor->esSocio){
            $descuento = $venta->importe * 0.2;
        }
        $total = $venta->importe - $descuento;
        $data = [
            'title'=>'Asociación Ganadera','subtitle' =>'de Carlos A. Carrillo',
            'venta'=> $venta,
            'descuento'=>$descuento,
            'total'=>$total
        ];
      
        $pdf = PDF::loadView('/ventas/nota',$data);
        $pdf->setOption(['defaultFont'=>'sans-serif']);  
        $pdf->render();

        return $pdf->download('venta.pdf');
    }
}
