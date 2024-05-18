<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminActionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (str_starts_with($this->input('action', null), "student#")){
            return
                Auth::guard("admins")->check()
                &&
                (
                    $this->user("admins")->level == "S" ||
                    $this->user("admins")->level == "M"
                );
        }
        return
            Auth::guard("admins")->check()
            &&
            (
                $this->user("admins")->level == "S"
            );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'action'=>[
                'required',
                Rule::in(['student#ban', 'student#unban', 'admin#activate', 'admin#deactivate'])
            ],
            'payload'=>'required'
        ];
    }
}
