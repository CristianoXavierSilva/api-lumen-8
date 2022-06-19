<?php

namespace App\Http\Controllers\Receptionists;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Examiners\CategoriesExaminerController;
use App\Http\Controllers\Receivers\CategoriesReceiverController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $validation;
    protected $examination;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->validation = new CategoriesReceiverController();
        $this->examination = new CategoriesExaminerController();
    }

    /**
     * Store a new category.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse {

        $result = $this->validation->validatingCreate($request);

        if ($result->status() == 100) {
            $result = $this->examination->examiningCreate($result->getData()->delivery);
        }
        return $result;
    }

    /**
     * Update the specified category.
     *
     * @param  Request  $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse {

        $result = $this->validation->validatingUpdate($request);

        if ($result->status() == 100) {
            $result = $this->examination->examiningUpdate($result->getData()->delivery, $id);
        }
        return $result;
    }
}
