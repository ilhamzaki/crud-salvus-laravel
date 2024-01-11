<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=> "max:50|required",
            "gender"=> "required",
            "email"=> "max:50|required",
            "phone"=> "max:20|required",
            "address"=> "max:100|required",
            "job_id"=> "required",
        ];
    }

    public function attributes()
    {
        return [
            "job_id"=> "job",
        ];
    }
}
