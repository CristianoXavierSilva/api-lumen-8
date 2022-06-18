<?php

namespace App\Models\Entities;

use App\Models\ModelBase;

class Contas extends ModelBase
{
    protected $table = 'tbl_contas';
    protected $primaryKey = 'id_conta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_categoria', 'con_titulo', 'con_valor', 'con_status'
    ];
}
