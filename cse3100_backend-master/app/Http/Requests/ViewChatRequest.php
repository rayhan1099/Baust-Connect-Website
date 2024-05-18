<?php

namespace App\Http\Requests;

use App\Models\Chat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ViewChatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->input("msg_id") != null){
            $msg = Chat::where('id', $this->input("msg_id"))->first();
            return
                Auth::check()
                &&
                Auth::hasUser()
                &&
                ($msg->from == Auth::user()->id ||$msg->from == $this->input('to'))
                &&
                ($msg->to == $this->input("to") || $msg->to == Auth::user()->id)
                ;
        }
        return
            Auth::check()
            &&
            Auth::hasUser();

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "to"=>"required|exists:students,id",
            "msg_id"=>"nullable|exists:chats,id"
        ];
    }
}
