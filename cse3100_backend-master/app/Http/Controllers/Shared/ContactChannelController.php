<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactChannelRequest;
use App\Http\Requests\UpdateContactChannelRequest;
use App\Models\ContactChannel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ContactChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactChannelRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreContactChannelRequest $request)
    {
        $channel_data = $request->validated();
        unset($channel_data["type"]);
        try {
            ContactChannel::create([
                "type"=>($request->validated("type") == 'job' ? 2 : 1),
                "channel_data"=>json_encode($channel_data),
                "student_id"=>Auth::user()->id,
            ]);
            return response()->json(["status"=>"ok","message"=>"Information added successfully","data"=>null]);
        }catch (\Exception $e){
            return response()->json(["status"=>"error","message"=>"Failed to store information","data"=>null], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactChannel  $contactChannel
     * @return Response
     */
    public function show(ContactChannel $contactChannel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactChannel  $contactChannel
     * @return Response
     */
    public function edit(ContactChannel $contactChannel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactChannelRequest  $request
     * @param  \App\Models\ContactChannel  $contactChannel
     * @return Response
     */
    public function update(UpdateContactChannelRequest $request, ContactChannel $contactChannel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactChannel  $contactChannel
     * @return Response
     */
    public function destroy(ContactChannel $contactChannel)
    {
        //
    }
}
