<?php

namespace App\Models\Queries;

use App\Models\Entities\Categorias;

class sqlCategorias extends Categorias
{
    public static function findTrashed(int $id) {
        return Categorias::withTrashed()
            ->findOrFail($id);
    }
}
