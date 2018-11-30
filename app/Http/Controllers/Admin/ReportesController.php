<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function reporte_mensual()
    {
        $valor_mensual = DB::table('factura as fa')
        // ->where('fa.fecha', )
        ->sum('fa.valor_total')
        ->get();

        return $valor_mensual;
    }
}
