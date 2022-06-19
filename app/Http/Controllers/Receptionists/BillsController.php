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

    /**
     * Update the specified bill.
     *
     * @param  Request  $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse {

        $result = $this->validation->validating($request);

        if ($result->status() == 100) {
            $result = $this->examination->examiningUpdate($result->getData()->delivery, $id);
        }
        return $result;
    }

    /**
     * Remove the specified bill from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        return $this->examination->examiningDelete($id);
    }

    /**
     * Restore the specified bill from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function restore(int $id): JsonResponse {
        return $this->examination->examiningRestore($id);
    }
}
