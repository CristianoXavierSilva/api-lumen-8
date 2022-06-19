<?php

namespace App\Http\Controllers\Receptionists;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Receivers\BillsReceiverController;
use App\Http\Controllers\Examiners\BillsExaminerController;
use Illuminate\Http\JsonResponse;

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
}
