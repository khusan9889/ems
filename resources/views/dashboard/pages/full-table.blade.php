@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">ОКС-детальная таблица</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Форма {{$data->id}}</h5>
                        <div>
                            <a href="{{ route('edit-page', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="{{ url('/') }}" class="btn btn-secondary me-2 btn-sm">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered align-middle">
                        <tbody>
                            <tbody>
                                <tr>
                                    <th>id</th>
                                    <td>{{$data->id}}</td>
                                </tr>
                                <tr>
                                    <th>Отделение</th>
                                    <td>{{$data->department}}</td>
                                </tr>
                                <tr>
                                    <th>№ Истории болезни</th>
                                    <td>{{$data->history_disease}}</td>
                                </tr>
                                <tr>
                                    <th>ФИО пациента</th>
                                    <td>{{$data->full_name}}</td>
                                </tr>
                                <tr>
                                    <th>Дата и время госпитализации</th>
                                    <td>{{$data->hospitalization_date}}</td>
                                </tr>
                                <tr>
                                    <th>Дата и время выписки</th>
                                    <td>{{$data->discharge_date}}</td>
                                </tr>
                                <tr>
                                    <th>Каналы госпитализации</th>
                                    <td>{{$data->hospitalization_channels}}</td>
                                </tr>
                                <tr>
                                    <th>Исход лечения</th>
                                    <td>{{$data->treatment_result}}</td>
                                </tr>
                                <tr>
                                    <th>Исход</th>
                                    <td>{{$data->final_result}}</td>
                                </tr>
                                <tr>
                                    <th>Срок ангинального приступа при поступлении</th>
                                    <td>{{$data->anginal_attack_date}}</td>
                                </tr>
                                <tr>
                                    <th>Показана экстренная ЧКВ/инвазивная ангиография?</th>
                                    <td>{{$data->cta_invasive_angiography}}</td>
                                </tr>
                                <tr>
                                    <th>Экстренная ЧКВ выполнена в течение 90 мин?</th>
                                    <td>{{$data->cta_90min}}</td>
                                </tr>
                                <tr>
                                    <th>Показана отсроченная ЧКВ/инвазивная ангиография?</th>
                                    <td>{{$data->deferred_cta_invasive}}</td>
                                </tr>
                                <tr>
                                    <th>Отсроченная ЧКВ выполнена?</th>
                                    <td>{{$data->deferred_cta_completed}}</td>
                                </tr>
                                <tr>
                                    <th>Причины невыполнения ЧКВ</th>
                                    <td>{{$data->reasons_not_performing_cta}}</td>
                                </tr>
                                <tr>
                                    <th>Показана ли тромболитическая терапия (ТЛТ)?</th>
                                    <td>{{$data->thrombolytic_therapy}}</td>
                                </tr>
                                <tr>
                                    <th>Проведена ли ТЛТ?</th>
                                    <td>{{$data->thrombolytic_therapy_administered}}</td>
                                </tr>
                                <tr>
                                    <th>Причины не проведения ТЛТ</th>
                                    <td>{{$data->not_administering_tlt}}</td>
                                </tr>
                                <tr>
                                    <th>Проведено ли во время госпитализации ЭКГ?</th>
                                    <td>{{$data->ecg_during_hospitalization}}</td>
                                </tr>
                                <tr>
                                    <th>Если проведено ЭКГ, СТ сегмента повышен?</th>
                                    <td>{{$data->st_segment}}</td>
                                </tr>
                                <tr>
                                    <th>Проведено ЭхоКГ (с оценкой ФВ ЛЖ%)?</th>
                                    <td>{{$data->echocardiogram}}</td>
                                </tr>
                                <tr>
                                    <th>Если «Да», то время первого измерения ФВ ЛЖ%</th>
                                    <td>{{$data->first_measurement}}</td>
                                </tr>
                                <tr>
                                    <th>Проведены анализы на ЛПНП</th>
                                    <td>{{$data->cholestero_levels}}</td>
                                </tr>
                                <tr>
                                    <th>Проведены анализ на АЧТВ (25-36сек)?</th>
                                    <td>{{$data->aptt}}</td>
                                </tr>
                                <tr>
                                    <th>Проведена антикоагулянтная терапия?</th>
                                    <td>{{$data->anticoagulant}}</td>
                                </tr>
                                <tr>
                                    <th>Принимал ли аспирин?</th>
                                    <td>{{$data->aspirin}}</td>
                                </tr>
                                <tr>
                                    <th>Принимал ингибиторы P2Y12</th>
                                    <td>{{$data->p2y12}}</td>
                                </tr>
                                <tr>
                                    <th>Принимал ли статины высокой интенсивности</th>
                                    <td>{{$data->high_intensity_statins}}</td>
                                </tr>
                                <tr>
                                    <th>Принимал ингибиторы АПФ или БРАII?</th>
                                    <td>{{$data->ACE_inhibitors_ARBs}}</td>
                                </tr>
                                <tr>
                                    <th>ФИО лечащего врача</th>
                                    <td>{{$data->physician_full_name}}</td>
                                </tr>
                                <tr>
                                    <th>ФИО специалиста стат.отдела</th>
                                    <td>{{$data->stat_department_full_name}}</td>
                                </tr>
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection





















