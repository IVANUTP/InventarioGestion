<?php

namespace App\Http\Controllers;

use App\Models\categoriaModel;
use App\Models\productoModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class graficaController extends Controller
{
    //
    public function index()
    {

        $productosPorFecha = productoModel::select(
            DB::raw('DATE(created_at) as fecha'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        $categoriasPorFecha = categoriaModel::select(
            DB::raw('DATE(created_at) as fecha'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        return view('dashboard', compact(
            'productosPorFecha',
            'categoriasPorFecha'
        ));
    }
}
