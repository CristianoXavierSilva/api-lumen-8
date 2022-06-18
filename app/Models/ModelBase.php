<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelBase extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    const CREATED_AT = 'data_hora_cadastro';
    const UPDATED_AT = 'data_hora_alteracao';
    const DELETED_AT = 'data_hora_exclusao';
}
