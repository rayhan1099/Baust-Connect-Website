<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard("admins")->check() && $this->user("admins")->level == "S";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'name_short'=>'required',
            'description'=>'required',
            'birth_date'=>'required|date',
            'backdrop'=>'required',
            'external_link'=>'required',
            'icon'=>'required'
        ];
    }
}
