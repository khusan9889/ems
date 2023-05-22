<x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('acs.acs_list') }}
        </h2> -->
    </x-slot>
    <style>
        table, th, td {
        border:1px solid black;
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
                    <th>treatment_result</th>
                    <th>severity_of_ts</th>
                    <th>injury_of_iss</th>
                    <th>arrival_after_injury</th>
                    <th>mechanism_of_injury</th>
                    <th>survey_of_surgeon</th>
                    <th>survey_of_neurosurgeon</th>
                    <th>survey_of_traumatologist</th>
                    <th>narrow_specialists</th>
                    <th>r_graphy</th>
                    <th>conducted_ultrasound</th>
                    <th>msct</th>
                    <th>msct_individual_parts</th>
                    <th>neutral_fats</th>
                    <th>analysis_of_hb_ht</th>
                    <th>dynamic_uzs</th>
                    <th>diagnostic_laparoscopy</th>
                    <th>thoracocentesis</th>
                    <th>laparotomy</th>
                    <th>thoracoscopy_thoracotomy</th>
                    <th>osteosynthesis_of_fractures</th>
                    <th>skull_trepanation</th>
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
                    <td>{{$item->treatment_result}}</td>
                    <td>{{$item->severity_of_ts}}</td>
                    <td>{{$item->injury_of_iss}}</td>
                    <td>{{$item->arrival_after_injury}}</td>
                    <td>{{$item->mechanism_of_injury}}</td>
                    <td>{{$item->survey_of_surgeon}}</td>
                    <td>{{$item->survey_of_neurosurgeon}}</td>
                    <td>{{$item->survey_of_traumatologist}}</td>
                    <td>{{$item->narrow_specialists}}</td>
                    <td>{{$item->r_graphy}}</td>
                    <td>{{$item->conducted_ultrasound}}</td>
                    <td>{{$item->msct}}</td>
                    <td>{{$item->msct_individual_parts}}</td>
                    <td>{{$item->neutral_fats}}</td>
                    <td>{{$item->analysis_of_hb_ht}}</td>
                    <td>{{$item->dynamic_uzs}}</td>
                    <td>{{$item->diagnostic_laparoscopy}}</td>
                    <td>{{$item->thoracocentesis}}</td>
                    <td>{{$item->laparotomy}}</td>
                    <td>{{$item->thoracoscopy_thoracotomy}}</td>
                    <td>{{$item->osteosynthesis_of_fractures}}</td>
                    <td>{{$item->skull_trepanation}}</td>
                    <td>{{$item->physician_full_name}}</td>
                    <td>{{$item->stat_department_full_name}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
