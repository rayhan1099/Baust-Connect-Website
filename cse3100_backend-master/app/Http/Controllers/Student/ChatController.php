<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\ViewChatListRequest;
use App\Http\Requests\ViewChatRequest;
use App\Models\Chat;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

class ChatController extends Controller
{
    private $max_message = 100;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ViewChatListRequest $request)
    {
        //load list of messages
        $list = Chat::where("to",Auth::user()->id)
            //->orWhere("to",Auth::user()->id)
            ->orderBy('id','desc')
            //->groupBy('from')
            //->distinct()
            ->with('sender')
            //->select('to')
        ;
            //->groupBy('to')
        return \response()->json(["status"=>"ok","message"=>"List","data"=>$list->get()->unique('from')]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    //send message
    public function store(StoreChatRequest $request)
    {
        $data = $request->validated();
        $data["from"] = Auth::user()->id;
        try {
            $message = Chat::create($data);
            return response()->json(["status"=>"ok","message"=>"Sent","data"=>$message]);
        }catch (\Exception $e){
            return response()->json(["status"=>"error","message"=>"Failed"], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //receive message
    public function receive(ViewChatRequest $request)
    {
        $new_messages = null;

        if ($request->validated('msg_id') == null){
            //sent by 'to'
            $new_messages =
                Chat::where(function ($query) use ($request){
                    $query->where("from",$request->validated('to'))
                        ->where('to',Auth::user()->id);

                })
                ->orWhere(function ($query) use ($request){
                    $query->where('from', Auth::user()->id)
                        ->where("to",$request->validated('to'));
                })
                ->orderBy('id','desc')
                ->limit($this->max_message)
                ->get();
        }else{
            $new_messages = Chat::where("from",$request->validated('to'))
                ->where('to',Auth::user()->id)
                ->where('id','>',$request->validated('msg_id'))
                ->orderBy('id','desc')
                ->limit($this->max_message)
                ->get();

        }
        return response()->json(["status"=>"ok","message"=>"New message","data"=>$new_messages]);

    }


}
