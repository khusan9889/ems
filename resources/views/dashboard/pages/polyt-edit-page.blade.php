@extends('dashboard.layouts.default')
@section('content')
    <h1 class="page-header">Политравма-таблица для изменений</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Форма {{$data->id}}</h5>
                        <a href="{{ url('/polytrauma') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                        <form method="POST" action="{{ route('polyt-update-data', ['id' => $data->id]) }}">
                            @csrf
                        @method('PUT')

                        <table class="table table-striped table-bordered align-middle">
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
                                    <th>Номер ИБ</th>
                                    <td>{{$data->history_disease}}</td>
                                </tr>
                                <tr>
                                    <th>Пациент ФИО</th>
                                    <td>{{$data->full_name}}</td>
                                </tr>
                                <tr>
                                    <th>Дата поступления</th>
                                    <td>{{$data->hospitalization_date}}</td>
                                </tr>
                                <tr>
                                    <th>Дата выписки</th>
                                    <td>{{$data->discharge_date}}</td>
                                </tr>
                                <tr>
                                    <th>Канал госпитализации</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hospitalization_channels" id="hospitalizationOption1" value="Скорая" {{ $data->hospitalization_channels == 'Скорая' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="hospitalizationOption1">Скорая</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hospitalization_channels" id="hospitalizationOption2" value="Самотек" {{ $data->hospitalization_channels == 'Самотек' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="hospitalizationOption2">Самотек</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hospitalization_channels" id="hospitalizationOption3" value="Направление" {{ $data->hospitalization_channels == 'Направление' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="hospitalizationOption3">Направление</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Кол-во к/дней</th>
                                    <td>{{$data->days_amount}}</td>
                                </tr>
                                <tr>
                                    <th>Кол-во к/дней в отд. Реанимации</th>
                                    <td>{{$data->days_in_intensive_care}}</td>
                                </tr>
                                <tr>
                                    <th>Исход лечения</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="treatment_result" id="treatment_resultOption1" value="Выписан" {{ $data->treatment_result == 'Выписан' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="treatment_resultOption1">Выписан</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="treatment_result" id="treatment_resultOption2" value="Летальный исход" {{ $data->treatment_result == 'Летальный исход' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="treatment_resultOption2">Летальный исход</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Тяжесть состояния по TS (баллов)</th>
                                    <td>{{$data->severity_of_ts}}</td>
                                </tr>
                                <tr>
                                    <th>Тяжесть состояния по ISS (баллов)</th>
                                    <td>{{$data->injury_of_iss}}</td>
                                </tr>
                                <tr>
                                    <th>Время поступления после получения травмы:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption1" value="до 1ч." {{ $data->arrival_after_injury == 'до 1ч.' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="arrival_after_injuryOption1">до 1ч.</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption2" value="1-3ч." {{ $data->arrival_after_injury == '1-3ч.' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="arrival_after_injuryOption2">1-3ч.</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption3" value="6-12ч." {{ $data->arrival_after_injury == '6-12ч.' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="arrival_after_injuryOption3">6-12ч.</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption4" value="12-24ч." {{ $data->arrival_after_injury == '12-24ч.' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="arrival_after_injuryOption4">12-24ч.</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption5" value="позже 24ч." {{ $data->arrival_after_injury == 'позже 24ч.' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="arrival_after_injuryOption5">позже 24ч.</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Механизм травмы</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="mechanism_of_injury" id="mechanism_of_injuryOption1" value="ДТП" {{ $data->mechanism_of_injury == 'ДТП' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="mechanism_of_injuryOption1">ДТП</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="mechanism_of_injury" id="mechanism_of_injuryOption2" value="Кататравма" {{ $data->mechanism_of_injury == 'Кататравма' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="mechanism_of_injuryOption2">Кататравма</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="mechanism_of_injury" id="mechanism_of_injuryOption3" value="Производственная" {{ $data->mechanism_of_injury == 'Производственная' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="mechanism_of_injuryOption3">Производственная</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="mechanism_of_injury" id="mechanism_of_injuryOption4" value="Прочие" {{ $data->mechanism_of_injury == 'Прочие' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="mechanism_of_injuryOption4">Прочие</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Осмотр хирурга:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="survey_of_surgeon" id="survey_of_surgeonOption1" value="Да" {{ $data->survey_of_surgeon == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="survey_of_surgeonOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="survey_of_surgeon" id="survey_of_surgeonOption2" value="Нет" {{ $data->survey_of_surgeon == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="survey_of_surgeonOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Осмотр нейрохирурга:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="survey_of_neurosurgeon" id="survey_of_neurosurgeonOption1" value="Да" {{ $data->survey_of_neurosurgeon == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="survey_of_neurosurgeonOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="survey_of_neurosurgeon" id="survey_of_neurosurgeonOption2" value="Нет" {{ $data->survey_of_neurosurgeon == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="survey_of_neurosurgeonOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Осмотр травматолога:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="survey_of_traumatologist" id="survey_of_traumatologistOption1" value="Да" {{ $data->survey_of_traumatologist == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="survey_of_traumatologistOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="survey_of_traumatologist" id="survey_of_traumatologistOption2" value="Нет" {{ $data->survey_of_traumatologist == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="survey_of_traumatologistOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Осмотр других узких специалистов:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="narrow_specialists" id="narrow_specialistsOption1" value="Да" {{ $data->narrow_specialists == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="narrow_specialistsOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="narrow_specialists" id="narrow_specialistsOption2" value="Нет" {{ $data->narrow_specialists == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="narrow_specialistsOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведена R-графия: <br>(черепа, грудной клетки, костей таза, конечностей):</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_graphy" id="r_graphyOption1" value="Да" {{ $data->r_graphy == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="r_graphyOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_graphy" id="r_graphyOption2" value="Нет" {{ $data->r_graphy == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="r_graphyOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведено УЗС<br>(плевральныйх и брюшной полостей, забрюшинного пространства):</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="conducted_ultrasound" id="conducted_ultrasoundOption1" value="Да" {{ $data->conducted_ultrasound == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="conducted_ultrasoundOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="conducted_ultrasound" id="conducted_ultrasoundOption2" value="Нет" {{ $data->conducted_ultrasound == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="conducted_ultrasoundOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведено МКСТ<br>(всего тела "full body"):</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="msct" id="msctOption1" value="Да" {{ $data->msct == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="msctOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="msct" id="msctOption2" value="Нет" {{ $data->msct == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="msctOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведено МКСТ<br>(отдельных частей тела):</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="msct_individual_parts" id="msct_individual_partsOption1" value="Да" {{ $data->msct_individual_parts == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="msct_individual_partsOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="msct_individual_parts" id="msct_individual_partsOption2" value="Нет" {{ $data->msct_individual_parts == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="msct_individual_partsOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Содержание нейтральный жиров в крови и моче:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="neutral_fats" id="neutral_fatsOption1" value="Да" {{ $data->neutral_fats == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="neutral_fatsOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="neutral_fats" id="neutral_fatsOption2" value="Нет" {{ $data->neutral_fats == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="neutral_fatsOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведен анализ Нв, Ht в динамике:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="analysis_of_hb_ht" id="analysis_of_hb_htOption1" value="Да" {{ $data->analysis_of_hb_ht == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="analysis_of_hb_htOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="analysis_of_hb_ht" id="analysis_of_hb_htOption2" value="Нет" {{ $data->analysis_of_hb_ht == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="analysis_of_hb_htOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведено УЗС в динамике:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dynamic_uzs" id="dynamic_uzsOption1" value="Да" {{ $data->dynamic_uzs == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="dynamic_uzsOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dynamic_uzs" id="dynamic_uzsOption2" value="Нет" {{ $data->dynamic_uzs == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="dynamic_uzsOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Диагностическая лапароскопия</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="diagnostic_laparoscopy" id="diagnostic_laparoscopyOption1" value="Да" {{ $data->diagnostic_laparoscopy == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="diagnostic_laparoscopyOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="diagnostic_laparoscopy" id="diagnostic_laparoscopyOption2" value="Нет" {{ $data->diagnostic_laparoscopy == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="diagnostic_laparoscopyOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Торакоцентез</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="thoracocentesis" id="thoracocentesisOption1" value="Да" {{ $data->thoracocentesis == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="thoracocentesisOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="thoracocentesis" id="thoracocentesisOption2" value="Нет" {{ $data->thoracocentesis == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="thoracocentesisOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Лапаратомия</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="laparotomy" id="laparotomyOption1" value="Да" {{ $data->laparotomy == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="laparotomyOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="laparotomy" id="laparotomyOption2" value="Нет" {{ $data->laparotomy == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="laparotomyOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Торакоскопия (торакотомия):</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="thoracoscopy_thoracotomy" id="thoracoscopy_thoracotomyOption1" value="Да" {{ $data->thoracoscopy_thoracotomy == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="thoracoscopy_thoracotomyOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="thoracoscopy_thoracotomy" id="thoracoscopy_thoracotomyOption2" value="Нет" {{ $data->thoracoscopy_thoracotomy == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="thoracoscopy_thoracotomyOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Остеосинтез переломов:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="osteosynthesis_of_fractures" id="osteosynthesis_of_fracturesOption1" value="Да" {{ $data->osteosynthesis_of_fractures == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="osteosynthesis_of_fracturesOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="osteosynthesis_of_fractures" id="osteosynthesis_of_fracturesOption2" value="Нет" {{ $data->osteosynthesis_of_fractures == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="osteosynthesis_of_fracturesOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Трепанация черепа:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="skull_trepanation" id="skull_trepanationOption1" value="Да" {{ $data->skull_trepanation == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="skull_trepanationOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="skull_trepanation" id="skull_trepanationOption2" value="Нет" {{ $data->skull_trepanation == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="skull_trepanationOption1">Нет</label>
                                        </div>
                                    </td>
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
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

