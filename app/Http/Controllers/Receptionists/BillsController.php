<?php

namespace App\Http\Controllers\Receptionists;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Receivers\BillsReceiverController;
use App\Http\Controllers\Examiners\BillsExaminerController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->validation = new BillsReceiverController();
        $this->examination = new BillsExaminerController();
    }

    /**
     * Display a listing of bills.
     */
    public function index(string $paginate = null): JsonResponse {
        return $this->examination->examiningList($paginate);
    }

    /**
     * Store a new category.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse {

        $result = $this->validation->validating($request);

        if ($result->status() == 100) {
            $result = $this->examination->examiningCreate($result->getData()->delivery);
        }
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse {
        return $this->examination->examiningRead($id);
    }
}
