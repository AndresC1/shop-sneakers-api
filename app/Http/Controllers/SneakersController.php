<?php

namespace App\Http\Controllers;

use App\Models\Sneakers;
use App\Http\Requests\StoreSneakersRequest;
use App\Http\Requests\UpdateSneakersRequest;
use App\Http\Resources\Sneakers\SneakersResource;
use Exception;

class SneakersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return response()->json([
                "sneakers" => SneakersResource::collection(Sneakers::all()), 
                "message" => "Listado de sneakers",
                "status" => 201
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Error al obtener los sneakers", 
                "error" => $e->getMessage(),
                "status" => 400
            ], 400);
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
    public function store(StoreSneakersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sneakers $sneakers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sneakers $sneakers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSneakersRequest $request, Sneakers $sneakers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sneakers $sneakers)
    {
        //
    }
}
