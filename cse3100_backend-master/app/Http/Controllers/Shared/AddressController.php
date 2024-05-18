<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\Student;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AddressResource
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAddressRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAddressRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['student_id'] = Auth::user()->id;
            $address = Address::create($validated);
            if (Auth::user()->address_id == null) {
                Student::where("id", Auth::user()->id)
                    ->update(["address_id" => $address->id,]);
            }
            return response()->json(["status" => "ok", "message" => "Address added successfully!", "data" => null]);
        } catch (\Exception $e) {
            return response()->json(["status" => "error", "message" => "Failed to store data {$e->getMessage()}", "data" => null], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Address $address
     * @return AddressResource
     */
    public function show(Address $address): AddressResource
    {
        return new AddressResource($address);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAddressRequest $request
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
