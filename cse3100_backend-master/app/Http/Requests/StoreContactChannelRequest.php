<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;

class StoreContactChannelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::hasUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "place_name"=>"required",
            "position"=>"required",
            "web_link"=>"required|active_url",
            "enroll_start"=>"required|date",
            "enroll_end"=>"nullable|date",
            "type"=>[
                "required",
                Rule::in(['job','ac'])
            ]
        ];
    }
}
