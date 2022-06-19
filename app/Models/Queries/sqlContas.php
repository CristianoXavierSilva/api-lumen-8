<?php

namespace App\Models\Queries;

use App\Models\Entities\Contas;

class sqlContas extends Contas
{
    protected const TABLE = 'tbl_contas';

    public static function fullOrFind(string $column, string $value) {
        return sqlContas::select(self::TABLE.'.*', 'tbl_categorias.cat_titulo')
            ->join('tbl_categorias', self::TABLE.'.id_categoria', '=', 'tbl_categorias.id_categoria')
            ->where(self::TABLE.'.'.$column, $value)
            ->get()->first();
    }

    public static function findTrashed(int $id) {
        return Contas::withTrashed()
            ->findOrFail($id);
    }
}
