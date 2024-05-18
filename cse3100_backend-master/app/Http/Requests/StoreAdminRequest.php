<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'password'=>'required|min:8',
            'level'=>[
                'required',
                'in'=>Rule::in(["S", "M"])
            ],
            'email'=>'required|email',
            'full_name'=>'required|min:7|max:60',
            'uni_per_id'=>'required|size:9|unique:App\Models\Admin,uni_per_id',
        ];
    }
}
