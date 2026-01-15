<?php

namespace App\Exports;

use App\Models\productoModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return productoModel::with('categoria')->get()->map(function ($producto) {
            return [
                'Producto'     => $producto->nombre,
                'Descripción'  => $producto->descripcion,
                'Categoría'    => $producto->categoria->nombre ?? 'Sin categoría',
                'Precio'       => $producto->precio,
                'Stock'        => $producto->cantidad,
                'Estado'       => $producto->cantidad > 0 ? 'Disponible' : 'Sin stock',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Producto',
            'Descripción',
            'Categoría',
            'Precio',
            'Stock',
            'Estado',
        ];
    }
}
