<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUploadDataRequest;
use App\Http\Requests\UpdateUploadDataRequest;
use App\Models\UploadData;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @param  \App\Http\Requests\StoreUploadDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUploadDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UploadData  $uploadData
     * @return \Illuminate\Http\Response
     */
    public function show(UploadData $uploadData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UploadData  $uploadData
     * @return \Illuminate\Http\Response
     */
    public function edit(UploadData $uploadData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUploadDataRequest  $request
     * @param  \App\Models\UploadData  $uploadData
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUploadDataRequest $request, UploadData $uploadData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UploadData  $uploadData
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadData $uploadData)
    {
        //
    }
}
