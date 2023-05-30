@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">ОКС-детальная таблица</h1>
    <div class="row justify-content-center">
        @foreach($data as $key => $item)
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Форма {{$item->id}}</h5>
                            <table class="table table-striped table-bordered align-middle">
                                <tbody>
                                    <tr>
                                        <th>id</th>
                                        <td>{{$item->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Отделение</th>
                                        <td>{{$item->department}}</td>
                                    </tr>
                                    <tr>
                                        <th>№ Истории болезни</th>
                                        <td>{{$item->history_disease}}</td>
                                    </tr>
                                    <tr>
                                        <th>ФИО пациента</th>
                                        <td>{{$item->full_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата и время госпитализации</th>
                                        <td>{{$item->hospitalization_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата и время выписки</th>
                                        <td>{{$item->discharge_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Каналы госпитализации</th>
                                        <td>{{$item->hospitalization_channels}}</td>
                                    </tr>
                                    <tr>
                                        <th>Исход лечения</th>
                                        <td>{{$item->treatment_result}}</td>
                                    </tr>
                                    <tr>
                                        <th>Исход</th>
                                        <td>{{$item->final_result}}</td>
                                    </tr>
                                    <tr>
                                        <th>Срок ангинального приступа при поступлении</th>
                                        <td>{{$item->anginal_attack_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Показана экстренная ЧКВ/инвазивная ангиография?</th>
                                        <td>{{$item->cta_invasive_angiography}}</td>
                                    </tr>
                                    <tr>
                                        <th>Экстренная ЧКВ выполнена в течение 90 мин?</th>
                                        <td>{{$item->cta_90min}}</td>
                                    </tr>
                                    <tr>
                                        <th>Показана отсроченная ЧКВ/инвазивная ангиография?</th>
                                        <td>{{$item->deferred_cta_invasive}}</td>
                                    </tr>
                                    <tr>
                                        <th>Отсроченная ЧКВ выполнена?</th>
                                        <td>{{$item->deferred_cta_completed}}</td>
                                    </tr>
                                    <tr>
                                        <th>Причины невыполнения  ЧКВ</th>
                                        <td>{{$item->reasons_not_performing_cta}}</td>
                                    </tr>
                                    <tr>
                                        <th>Показана ли тромболитическая терапия (ТЛТ)?</th>
                                        <td>{{$item->thrombolytic_therapy}}</td>
                                    </tr>
                                    <tr>
                                        <th>Проведена ли ТЛТ?</th>
                                        <td>{{$item->thrombolytic_therapy_administered}}</td>
                                    </tr>
                                    <tr>
                                        <th>Причины не проведения ТЛТ</th>
                                        <td>{{$item->not_administering_tlt}}</td>
                                    </tr>
                                    <tr>
                                        <th>Проведено ли во время госпитализации ЭКГ?</th>
                                        <td>{{$item->ecg_during_hospitalization}}</td>
                                    </tr>
                                    <tr>
                                        <th>Если проведено ЭКГ, СТ сегмента повышен?</th>
                                        <td>{{$item->st_segment}}</td>
                                    </tr>
                                    <tr>
                                        <th>Проведено ЭхоКГ (с оценкой ФВ ЛЖ%)?</th>
                                        <td>{{$item->echocardiogram}}</td>
                                    </tr>
                                    <tr>
                                        <th>Если «Да», то время первого измерения ФВ ЛЖ%</th>
                                        <td>{{$item->first_measurement}}</td>
                                    </tr>
                                    <tr>
                                        <th>Проведены анализы на ЛПНП</th>
                                        <td>{{$item->cholestero_levels}}</td>
                                    </tr>
                                    <tr>
                                        <th>Проведены анализ на АЧТВ (25-36сек)?</th>
                                        <td>{{$item->aptt}}</td>
                                    </tr>
                                    <tr>
                                        <th>Проведена антикоагулянтная терапия?</th>
                                        <td>{{$item->anticoagulant}}</td>
                                    </tr>
                                    <tr>
                                        <th>Принимал ли аспирин?</th>
                                        <td>{{$item->aspirin}}</td>
                                    </tr>
                                    <tr>
                                        <th>Принимал ингибиторы P2Y12</th>
                                        <td>{{$item->p2y12}}</td>
                                    </tr>
                                    <tr>
                                        <th>Принимал ли статины высокой интенсивности</th>
                                        <td>{{$item->high_intensity_statins}}</td>
                                    </tr>
                                    <tr>
                                        <th>Принимал ингибиторы АПФ или БРАII?</th>
                                        <td>{{$item->ACE_inhibitors_ARBs}}</td>
                                    </tr>
                                    <tr>
                                        <th>ФИО лечащего врача</th>
                                        <td>{{$item->physician_full_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>ФИО специалиста стат.отдела</th>
                                        <td>{{$item->stat_department_full_name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection