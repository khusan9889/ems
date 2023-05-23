    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('acs.acs_list') }}
        </h2>
    </x-slot>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>department</th>
                    <th>history_disease</th>
                    <th>full_name</th>
                    <th>hospitalization_date</th>
                    <th>discharge_date</th>
                    <th>hospitalization_channels</th>
                    <!-- <th>treatment_result</th>
                    <th>final_result</th>
                    <th>anginal_attack_date</th>
                    <th>cta_invasive_angiography</th>
                    <th>cta_90min</th>
                    <th>deferred_cta_invasive</th>
                    <th>deferred_cta_completed</th>
                    <th>reasons_not_performing_cta</th>
                    <th>thrombolytic_therapy</th>
                    <th>thrombolytic_therapy_administered</th>
                    <th>not_administering_tlt</th>
                    <th>ecg_during_hospitalization</th>
                    <th>st_segment</th>
                    <th>echocardiogram</th>
                    <th>first_measurement</th>
                    <th>cholestero_levels</th>
                    <th>aptt</th>
                    <th>anticoagulant</th>
                    <th>aspirin</th>
                    <th>p2y12</th>
                    <th>high_intensity_statins</th>
                    <th>ACE_inhibitors_ARBs</th> -->
                    <th>physician_full_name</th>
                    <th>stat_department_full_name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->department}}</td>
                    <td>{{$item->history_disease}} </td>
                    <td>{{$item->full_name}}</td>
                    <td>{{$item->hospitalization_date}}</td>
                    <td>{{$item->discharge_date}}</td>
                    <td>{{$item->hospitalization_channels}}</td>
                    <!-- <td>{{$item->treatment_result}}</td>
                    <td>{{$item->final_result}}</td>
                    <td>{{$item->anginal_attack_date}}</td>
                    <td>{{$item->cta_invasive_angiography}}</td>
                    <td>{{$item->cta_90min}}</td>
                    <td>{{$item->deferred_cta_invasive}}</td>
                    <td>{{$item->deferred_cta_completed}}</td>
                    <td>{{$item->reasons_not_performing_cta}}</td>
                    <td>{{$item->thrombolytic_therapy}}</td>
                    <td>{{$item->thrombolytic_therapy_administered}}</td>
                    <td>{{$item->not_administering_tlt}}</td>
                    <td>{{$item->ecg_during_hospitalization}}</td>
                    <td>{{$item->st_segment}}</td>
                    <td>{{$item->echocardiogram}}</td>
                    <td>{{$item->first_measurement}}</td>
                    <td>{{$item->cholestero_levels}}</td>
                    <td>{{$item->aptt}}</td>
                    <td>{{$item->anticoagulant}}</td>
                    <td>{{$item->aspirin}}</td>
                    <td>{{$item->p2y12}}</td>
                    <td>{{$item->high_intensity_statins}}</td>
                    <td>{{$item->ACE_inhibitors_ARBs}}</td> -->
                    <td>{{$item->physician_full_name}}</td>
                    <td>{{$item->stat_department_full_name}}</td>

                </tr>
                @endforeach
            </tbody>


        </table>
    </div>