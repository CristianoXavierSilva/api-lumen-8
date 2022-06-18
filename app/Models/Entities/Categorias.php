<?php

namespace App\Models\Entities;

use App\Models\ModelBase;

class Categorias extends ModelBase
{
    protected $table = 'tbl_categorias';
    protected $primaryKey = 'id_categoria';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_titulo'
    ];
}
