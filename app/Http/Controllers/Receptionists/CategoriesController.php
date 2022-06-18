<?php

namespace App\Http\Controllers\Receptionists;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Examiners\CategoriesExaminerController;
use App\Http\Controllers\Receivers\CategoriesReceiverController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    public function create(Request $request): JsonResponse {

        $validation = new CategoriesReceiverController();
        $result = $validation->validatingCreate($request);

        if ($result->status() == 100) {
            $examination = new CategoriesExaminerController();
            $result = $examination->examiningCreate($result->getData()->delivery);
        }
        return $result;
    }
}
