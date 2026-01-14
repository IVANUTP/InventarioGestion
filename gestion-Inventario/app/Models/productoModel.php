<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productoModel extends Model
{
    //

    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'categoria_id',
        'img',
    ];


    protected $casts = [
        'precio'   => 'decimal:2',
        'cantidad' => 'integer',
    ];

     public function categoria()
    {
        return $this->belongsTo(categoriaModel::class, 'categoria_id');
    }

}
