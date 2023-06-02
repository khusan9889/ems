<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreACSRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'department' => 'required',
            'history_disease' => 'required',
            'full_name' => 'required',
            'hospitalization_date' => 'required',
            'discharge_date' => 'required',
            'physician_full_name' => 'required',
            'stat_department_full_name' => 'required',
            'hospitalization_channels' => 'required',
            'treatment_result' => 'required',
            
        ];
    }
}
