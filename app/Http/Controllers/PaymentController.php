<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $userId
     * @return JsonResponse
     */
    public function index($userId): JsonResponse
    {
        $payments = Payment::where('user_id', $userId)->get();

        return response()->json([
            'success' => true,
            'payments' => $payments
        ], ResponseAlias::HTTP_OK);
    }
}
