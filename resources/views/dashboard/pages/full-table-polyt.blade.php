@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">Политравма-детальная таблица</h1>
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
                                    <th>Тяжесть состояния по TS</th>
                                    <td>{{$item->severity_of_ts}}</td>
                                </tr>
                                <tr>
                                    <th>Тяжесть повреждения по ISS</th>
                                    <td>{{$item->injury_of_iss}}</td>
                                </tr>
                                <tr>
                                    <th>Время поступления после получения травмы</th>
                                    <td>{{$item->arrival_after_injury}}</td>
                                </tr>
                                <tr>
                                    <th>Механизм травмы</th>
                                    <td>{{$item->mechanism_of_injury}}</td>
                                </tr>

                                <tr>
                                    <th>Осмотр хирурга</th>
                                    <td>{{$item->survey_of_surgeon}}</td>
                                </tr>
                                <tr>
                                    <th>Осмотр нейрохирурга</th>
                                    <td>{{$item->survey_of_neurosurgeon}}</td>
                                </tr>
                                <tr>
                                    <th>Осмотр травматолога</th>
                                    <td>{{$item->survey_of_traumatologist}}</td>
                                </tr>
                                <tr>
                                    <th>Осмотр других узких специалистов</th>
                                    <td>{{$item->narrow_specialists}}</td>
                                </tr>
                                <tr>
                                    <th>Проведена R-графия</th>
                                    <td>{{$item->r_graphy}}</td>
                                </tr>
                                <tr>
                                    <th>Проведено УЗС</th>
                                    <td>{{$item->conducted_ultrasound}}</td>
                                </tr>
                                <tr>
                                    <th>Проведена МСКТ</th>
                                    <td>{{$item->msct}}</td>
                                </tr>
                                <tr>
                                    <th>Проведена МСКТ (отдельных частей тела)</th>
                                    <td>{{$item->msct_individual_parts}}</td>
                                </tr>
                                <tr>
                                    <th>Содержания нейтральных жиров в крови и моче</th>
                                    <td>{{$item->neutral_fats}}</td>
                                </tr>
                                <tr>
                                    <th>Проведен анализ  Нв, Ht в динамике</th>
                                    <td>{{$item->analysis_of_hb_ht}}</td>
                                </tr>
                                <tr>
                                    <th>Проведено УЗС в динамике</th>
                                    <td>{{$item->dynamic_uzs}}</td>
                                </tr>
                                <tr>
                                    <th>Диагностическая лапароскопия</th>
                                    <td>{{$item->diagnostic_laparoscopy}}</td>
                                </tr>
                                <tr>
                                    <th>Торакоцентез</th>
                                    <td>{{$item->thoracocentesis}}</td>
                                </tr>
                                <tr>
                                    <th>Лапаратомия</th>
                                    <td>{{$item->laparotomy}}</td>
                                </tr>
                                <tr>
                                    <th>Торакоскопия (торакотомия)</th>
                                    <td>{{$item->thoracoscopy_thoracotomy}}</td>
                                </tr>
                                <tr>
                                    <th>Остеосинтез переломов</th>
                                    <td>{{$item->osteosynthesis_of_fractures}}</td>
                                </tr>
                                <tr>
                                    <th>Трепанация черепа</th>
                                    <td>{{$item->skull_trepanation}}</td>
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