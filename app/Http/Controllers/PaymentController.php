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
     * @param $customerId
     * @return JsonResponse
     */
    public function index($customerId): JsonResponse
    {
        $payments = Payment::where('customer_id', $customerId)->with('customer')->get();

        return response()->json([
            'success' => true,
            'payments' => $payments
        ], ResponseAlias::HTTP_OK);
    }
}
