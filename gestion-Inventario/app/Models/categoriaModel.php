<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoriaModel extends Model
{
    //

    protected $table ='categorias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'img'
    ];

    protected $primaryKey = 'id';

    protected $keyType = 'int';



}
