<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilialSubWeekRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'branch_id' => 'required',
            'sub_filial_id' => 'nullable',
            'week_id' => 'required',
            'g_sleeping' => 'required',
            'g_ambulator' => 'required',
            'y_appeal' => 'required',
            'y_sleeping' => 'required',
            'y_ambulator' => 'required',
            'r_appeal' => 'required',
            'r_sleeping' => 'required',
            'r_death' => 'required',
            'r_dead' => 'required',
            'ambulance_03' => 'nullable',
            'children_03' => 'nullable',
            'arrived_himself' => 'nullable',
            'children_arrived_himself' => 'nullable',
            'came_ticket' => 'nullable',
            'children_came_ticket' => 'nullable',
            'recumbent' => 'nullable',
            'children_recumbent' => 'nullable',
            'operation' => 'nullable',
            'children_operation' => 'nullable',
            'high_tech_operas' => 'nullable',
            'children_high_tech_operas' => 'nullable',
            'death' => 'nullable',
            'children_death' => 'nullable',
            'ambulator' => 'nullable',
            'children_ambulator' => 'nullable',
            'ambulatory_operas' => 'nullable',
            'including_children' => 'nullable'

        ];
        return $rules;
    }
}
