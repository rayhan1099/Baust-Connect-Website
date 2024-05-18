<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'batch'=>'required|max:2|min:1|regex:/^[^0][0-9]*$/',
            'password'=>'required|min:8',
            'department_id'=>'required|exists:App\Models\Department,id',
            'email'=>'required|email',
            'full_name'=>'required|min:10|max:60',
            'student_id'=>'required|size:9|unique:App\Models\Student,student_id',
        ];
    }
/*    public function all($keys = null){
        if(empty($keys)){
            return parent::json()->all();
        }

        return collect(parent::json()->all())->only($keys)->toArray();
    }
*/
}
