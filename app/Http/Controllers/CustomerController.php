<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = Customer::all();

        return response()->json([
            'success' => true,
            'users' => $users
        ], ResponseAlias::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['error' => 'User not found'], 400);
        }
        $data = $request->only('name', 'email', 'mobile');

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:customers,email,'. $customer->id,
            'mobile' => 'required|integer|digits:11|unique:customers,mobile,'. $customer->id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $product = $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'data' => $product
        ], ResponseAlias::HTTP_OK);
    }
}
