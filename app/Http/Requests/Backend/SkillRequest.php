<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
                        'title' => 'required|unique:skills,title',
                        'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                    ];
                }
            case 'PATCH':
                {
                    return [
                        'title' => 'required|unique:skills,title,'.$this->id,
                        'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                    ];
                }
            default:break;
        }
    }
}
