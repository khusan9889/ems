@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">Политравма-детальная таблица</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Форма {{$data->id}}</h5>
                        <div>
                            <a href="{{ route('polyt-edit-page', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="{{ url('/polytrauma/list') }}" class="btn btn-secondary me-2 btn-sm">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered align-middle">
                        <tbody>
                            <tr>
                                <th>id</th>
                                <td>{{$data->id}}</td>
                            </tr>
                            <tr>
                                <th>Субъект СЭМП</th>
                                <td>{{$data->branch->name}}</td>
                            </tr>
                            <tr>
                                <th>Отделение</th>
                                <td>{{$data->department->name}}</td>
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
                                <th>Тяжесть состояния по TS</th>
                                <td>{{$data->severity_of_ts}}</td>
                            </tr>
                            <tr>
                                <th>Тяжесть повреждения по ISS</th>
                                <td>{{$data->injury_of_iss}}</td>
                            </tr>
                            <tr>
                                <th>Время поступления после получения травмы</th>
                                <td>{{$data->arrival_after_injury}}</td>
                            </tr>
                            <tr>
                                <th>Механизм травмы</th>
                                <td>{{$data->mechanism_of_injury}}</td>
                            </tr>

                            <tr>
                                <th>Осмотр хирурга</th>
                                <td>{{$data->survey_of_surgeon}}</td>
                            </tr>
                            <tr>
                                <th>Осмотр нейрохирурга</th>
                                <td>{{$data->survey_of_neurosurgeon}}</td>
                            </tr>
                            <tr>
                                <th>Осмотр травматолога</th>
                                <td>{{$data->survey_of_traumatologist}}</td>
                            </tr>
                            <tr>
                                <th>Осмотр других узких специалистов</th>
                                <td>{{$data->narrow_specialists}}</td>
                            </tr>
                            <tr>
                                <th>Проведена R-графия</th>
                                <td>{{$data->r_graphy}}</td>
                            </tr>
                            <tr>
                                <th>Проведено УЗС</th>
                                <td>{{$data->conducted_ultrasound}}</td>
                            </tr>
                            <tr>
                                <th>Проведена МСКТ</th>
                                <td>{{$data->msct}}</td>
                            </tr>
                            <tr>
                                <th>Проведена МСКТ (отдельных частей тела)</th>
                                <td>{{$data->msct_individual_parts}}</td>
                            </tr>
                            <tr>
                                <th>Содержания нейтральных жиров в крови и моче</th>
                                <td>{{$data->neutral_fats}}</td>
                            </tr>
                            <tr>
                                <th>Проведен анализ  Нв, Ht в динамике</th>
                                <td>{{$data->analysis_of_hb_ht}}</td>
                            </tr>
                            <tr>
                                <th>Проведено УЗС в динамике</th>
                                <td>{{$data->dynamic_uzs}}</td>
                            </tr>
                            <tr>
                                <th>Диагностическая лапароскопия</th>
                                <td>{{$data->diagnostic_laparoscopy}}</td>
                            </tr>
                            <tr>
                                <th>Торакоцентез</th>
                                <td>{{$data->thoracocentesis}}</td>
                            </tr>
                            <tr>
                                <th>Лапаратомия</th>
                                <td>{{$data->laparotomy}}</td>
                            </tr>
                            <tr>
                                <th>Торакоскопия (торакотомия)</th>
                                <td>{{$data->thoracoscopy_thoracotomy}}</td>
                            </tr>
                            <tr>
                                <th>Остеосинтез переломов</th>
                                <td>{{$data->osteosynthesis_of_fractures}}</td>
                            </tr>
                            <tr>
                                <th>Трепанация черепа</th>
                                <td>{{$data->skull_trepanation}}</td>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection









