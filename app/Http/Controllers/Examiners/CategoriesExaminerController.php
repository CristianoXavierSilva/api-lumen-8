<?php

namespace App\Http\Controllers\Examiners;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\CategoriesCourierController;
use App\Interfaces\Examiners\InterCategoriesExaminer;
use App\Models\Entities\Categorias;
use Illuminate\Http\JsonResponse;

class CategoriesExaminerController extends Controller implements InterCategoriesExaminer
{
    public function examiningCreate($validatedData): JsonResponse {

        $datas = array(
            'cat_titulo' => $validatedData->titulo
        );
        $newRecord = Categorias::create($datas);

        return CategoriesCourierController::deliveryExaminingCreate($newRecord);
    }
}
