<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Http\Resources\Shopping\PurchaseResource;
use Exception;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $purchases = Auth::user()->purchases;
            return response()->json([
                'purchases' => PurchaseResource::collection($purchases),
                'message' => "Lista de compras",
                'status' => 200,
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'message' => "No se pudo obtener la lista de compras",
                'error' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseRequest $request)
    {
        $new_purchase = Purchase::create(
            $request->merge([
                'user_id' => Auth::user()->id,
                'status' => 'pending',
                'code' => 'ORD-'.uniqid().'-'.rand(0001, 9999).chr(rand(65, 90)).chr(rand(65, 90))
            ])->all()
        );
        try{
            return response()->json([
                'purchase' => new PurchaseResource($new_purchase),
                'message' => "Orden creada correctamente",
                'status' => 201,
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'message' => "No se pudo crear la orden",
                'error' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        try{
            return response()->json([
                'purchase' => new PurchaseResource($purchase),
                'message' => "Orden obtenida correctamente",
                'status' => 200,
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'message' => "No se pudo obtener la orden",
                'error' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
