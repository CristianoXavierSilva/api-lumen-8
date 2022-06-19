<?php

namespace App\Http\Controllers\Examiners;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\CategoriesCourierController;
use App\Interfaces\Examiners\InterCategoriesExaminer;
use App\Models\Entities\Categorias;
use Illuminate\Http\JsonResponse;

class CategoriesExaminerController extends Controller implements InterCategoriesExaminer
{
    public function examiningList($paginate = null): JsonResponse
    {
        if (!is_null($paginate)) {
            $categories = Categorias::paginate($paginate);
        } else {
            $categories = Categorias::all();
        }
        return CategoriesCourierController::deliveryExaminingList($categories);
    }

    public function examiningCreate($validatedData): JsonResponse {

        $datas = array(
            'cat_titulo' => $validatedData->titulo
        );
        $newRecord = Categorias::create($datas);

        return CategoriesCourierController::deliveryExaminingCreate($newRecord);
    }

    public function examiningRead(int $id): JsonResponse {
        try {
            $categoria = Categorias::findOrFail($id);
            return CategoriesCourierController::deliveryExaminingRead($categoria);

        } catch (\Exception $ex) {
            return CategoriesCourierController::deliveryExaminingUpdate(new Categorias());
        }
    }

    public function examiningUpdate($validatedData, int $id): JsonResponse {
        try {
            $categoria = Categorias::findOrFail($id);
            $categoria->cat_titulo = $validatedData->titulo;
            $categoria->update();

            return CategoriesCourierController::deliveryExaminingUpdate($categoria);

        } catch (\Exception $ex) {
            return CategoriesCourierController::deliveryExaminingUpdate(new Categorias());
        }
    }
}