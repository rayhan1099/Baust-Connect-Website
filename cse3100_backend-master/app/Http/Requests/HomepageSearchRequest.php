<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HomepageSearchRequest extends FormRequest
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
            'query'=>'required|string|min:3|max:14',
            'batch'=>'nullable|required_if:query,==,all|max:2|min:1',
            'dept'=>'nullable|required_if:query,==,all|exists:departments,id',
            'job'=>[
                'nullable',
                Rule::in(['job', 'no'])
            ]
        ];
    }
    function prepareForValidation()
    {
        if ($this->input('dept') == 'all' || !$this->input('dept')){
            $this->merge(['dept'=> null]);
        }
        if ($this->input('batch') == 'all' || !$this->input('batch')){
            $this->merge(['batch'=> null]);
        }
    }
}
