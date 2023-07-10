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
        $rules = [
            'branch_id' => 'required',
            'department_id' => 'required',
            'history_disease' => 'required',
            'full_name' => 'required',
            'hospitalization_date' => 'required',
            'discharge_date' => 'required',
            'physician_full_name' => 'required',
            'stat_department_full_name' => 'required',
            'hospitalization_channels' => 'required',
            'treatment_result' => 'required',
            'final_result' => 'required',
            'anginal_attack_date' => 'required',
            'cta_invasive_angiography' => 'required',
            'deferred_cta_invasive' => 'required',
            'deferred_cta_completed' => 'required',
            'reasons_not_performing_cta' => 'required',
            'thrombolytic_therapy' => 'required',
            'thrombolytic_therapy_administered' => 'required',
            'not_administering_tlt' => 'required',
            'ecg_during_hospitalization' => 'required',
            'st_segment' => 'required',
            'echocardiogram' => 'required',
            'first_measurement' => 'required',
            'cholestero_levels' => 'required',
            'aptt' => 'required',
            'anticoagulant' => 'required',
            'aspirin' => 'required',
            'p2y12' => 'required',
            'high_intensity_statins' => 'required',
            'ACE_inhibitors_ARBs' => 'required',
        ];

        if ($this->input('cta_invasive_angiography') === 'Нет') {
            $rules['cta_90min'] = 'nullable';
        } else {
            $rules['cta_90min'] = 'required';
        }

        if ($this->input('deferred_cta_invasive') === 'Нет') {
            $rules['deferred_cta_completed'] = 'nullable';
        } else {
            $rules['deferred_cta_completed'] = 'required';
        }

        if ($this->input('thrombolytic_therapy') === 'Нет') {
            $rules['thrombolytic_therapy_administered'] = 'nullable';
        } elseif ($this->input('thrombolytic_therapy') === 'Да'){
            $rules['not_administering_tlt'] = 'nullable';
        } else {
            $rules['thrombolytic_therapy'] = 'required';
        }

        if ($this->input('ecg_during_hospitalization') === 'Нет') {
            $rules['st_segment'] = 'nullable';
        } else {
            $rules['st_segment'] = 'required';
        }

        if ($this->input('echocardiogram') === 'Нет') {
            $rules['first_measurement'] = 'nullable';
        } else {
            $rules['first_measurement'] = 'required';
        }



        return $rules;
    }
}
