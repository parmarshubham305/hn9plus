<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                {
                    return [
                        'name' => 'required',
                        'designation' => 'required',
                        'summary' => 'required',
                        'skills' => 'required',
                        'address' => 'required',
                        'email' => 'required|unique:developers,email',
                    ];
                }
            case 'PATCH':
                {
                    return [
                        'name' => 'required',
                        'designation' => 'required',
                        'summary' => 'required',
                        'skills' => 'required',
                        'email' => 'required|unique:developers,email,'.$this->id,
                    ];
                }
            default:break;
        }
    }
}
