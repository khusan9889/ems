<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePolytraumaRequest extends FormRequest
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
            'branch_id' => 'required',
            'department_id' => 'required',
            'history_disease' => 'required',
            'full_name' => 'required',
            'hospitalization_date' => 'required',
            'discharge_date' => 'required',
            'hospitalization_channels' => 'required',
            'days_amount' => 'required',
            'days_in_intensive_care' => 'required',
            'treatment_result' => 'required',
            'severity_of_ts' => 'required',
            'injury_of_iss' => 'required',
            'arrival_after_injury' => 'required',
            'mechanism_of_injury' => 'required',
            'survey_of_surgeon' => 'required',
            'survey_of_neurosurgeon' => 'required',
            'survey_of_traumatologist' => 'required',
            'narrow_specialists' => 'required',
            'r_graphy' => 'required',
            'conducted_ultrasound' => 'required',
            'msct' => 'required',
            'msct_individual_parts' => 'required',
            'neutral_fats' => 'required',
            'analysis_of_hb_ht' => 'required',
            'dynamic_uzs' => 'required',
            'diagnostic_laparoscopy' => 'required',
            'thoracocentesis' => 'required',
            'laparotomy' => 'required',
            'thoracoscopy_thoracotomy' => 'required',
            'osteosynthesis_of_fractures' => 'required',
            'skull_trepanation' => 'required',
            'physician_full_name' => 'required',
            'stat_department_full_name' => 'required',
            'confirm_status' => 'required',

        ];


    }
}
