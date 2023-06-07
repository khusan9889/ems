    @extends('dashboard.layouts.default')

@section('content')
    <x-panel title="Регистр политравм в СЭМП">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('polytrauma.add') }}" method="POST">
            @csrf
            <div class="form-group">
                {{-- <label for="department">{{ __('validation.attributes.department') }}</label> --}}
                <select class="form-control" id="branch" name="branch_id">
                    <!-- Add options for department -->
                    <option value="" hidden>Выбрать отделение</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="history_disease">Номер ИБ</label>
                <input type="text" class="form-control" id="history_disease" name="history_disease">
            </div>
            <div class="form-group">
                <label for="full_name">Пациент ФИО</label>
                <input type="text" class="form-control" id="full_name" name="full_name">
            </div>
            <div class="form-group">
                <label for="hospitalization_date">Дата поступления</label>
                <input type="text" class="form-control" id="hospitalization_date" name="hospitalization_date">
            </div>
            <div class="form-group">
                <label for="discharge_date">Дата выписки</label>
                <input type="text" class="form-control" id="discharge_date" name="discharge_date">
            </div>
            <div class="form-group">
                <label for="hospitalization_channels"><b>Канал госпитализации</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalization_channels" id="hospitalizationOption1" value="Скорая">
                    <label class="form-check-label" for="hospitalizationOption1">Скорая</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalization_channels" id="hospitalizationOption2" value="Самотек">
                    <label class="form-check-label" for="hospitalizationOption2">Самотек</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalization_channels" id="hospitalizationOption3" value="Направление">
                    <label class="form-check-label" for="hospitalizationOption3">Направление</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="days_amount">Кол-во к/дней</label>
                <input type="text" class="form-control" id="days_amount" name="days_amount">
            </div>

            <div class="form-group">
                <label for="days_in_intensive_care">Кол-во к/дней в отд. Реанимации</label>
                <input type="text" class="form-control" id="days_in_intensive_care" name="days_in_intensive_care">
            </div>
            <div class="form-group">
                <label for="treatment_result"><b>Исход лечения</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="treatment_result" id="treatment_resultOption1" value="Выписан">
                    <label class="form-check-label" for="treatment_resultOption1">Выписан</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="treatment_result" id="treatment_resultOption2" value="Летальный исход">
                    <label class="form-check-label" for="treatment_resultOption2">Летальный исход</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="severity_of_ts">Тяжесть состояния по TS (баллов)</label>
                <input type="text" class="form-control" id="severity_of_ts" name="severity_of_ts">
            </div>
            <div class="form-group">
                <label for="injury_of_iss">Тяжесть состояния по ISS (баллов)</label>
                <input type="text" class="form-control" id="injury_of_iss" name="injury_of_iss">
            </div>
            <hr>
            <div class="form-group">
                <label for="arrival_after_injury"><b>Время поступления после получения травмы:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption1" value="до 1ч.">
                    <label class="form-check-label" for="arrival_after_injuryOption1">до 1ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption2" value="1-3ч.">
                    <label class="form-check-label" for="arrival_after_injuryOption2">1-3ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption3" value="6-12ч.">
                    <label class="form-check-label" for="arrival_after_injuryOption3">6-12ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption4" value="12-24ч.">
                    <label class="form-check-label" for="arrival_after_injuryOption4">12-24ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury" id="arrival_after_injuryOption5" value="позже 24ч.">
                    <label class="form-check-label" for="arrival_after_injuryOption5">позже 24ч.</label>
                </div>
            </div>
            <div class="form-group">
                <label for="mechanism_of_injury"><b>Механизм травмы</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="mechanism_of_injury" id="mechanism_of_injuryOption1" value="ДТП">
                    <label class="form-check-label" for="mechanism_of_injuryOption1">ДТП</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="mechanism_of_injury" id="mechanism_of_injuryOption2" value="Кататравма">
                    <label class="form-check-label" for="mechanism_of_injuryOption2">Кататравма</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="mechanism_of_injury" id="mechanism_of_injuryOption3" value="Производственная">
                    <label class="form-check-label" for="mechanism_of_injuryOption3">Производственная</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="mechanism_of_injury" id="mechanism_of_injuryOption4" value="Прочие">
                    <label class="form-check-label" for=mechanism_of_injuryOption4">Прочие</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="survey_of_surgeon"><b>Осмотр хирурга:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_surgeon" id="urgesurvey_of_surgeonOption1ntOption1" value="Да">
                    <label class="form-check-label" for="survey_of_surgeonOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_surgeon" id="survey_of_surgeonOption2" value="Нет">
                    <label class="form-check-label" for="survey_of_surgeonOption2">Нет</label>
                </div>
            </div>
            <div class="form-group">
                <label for="survey_of_neurosurgeon"><b>Осмотр нейрохирурга:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_neurosurgeon" id="survey_of_neurosurgeonOption1" value="Да">
                    <label class="form-check-label" for="survey_of_neurosurgeonOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_neurosurgeon" id="survey_of_neurosurgeonOption2" value="Нет">
                    <label class="form-check-label" for="survey_of_neurosurgeonOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="survey_of_traumatologist"><b>Осмотр травматолога:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_traumatologist" id="survey_of_traumatologistOption1" value="Да">
                    <label class="form-check-label" for="survey_of_traumatologistOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_traumatologist" id="survey_of_traumatologistOption2" value="Нет">
                    <label class="form-check-label" for="survey_of_traumatologistOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="narrow_specialists"><b>Осмотр других узких специалистов:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="narrow_specialists" id="narrow_specialistsOption1" value="Да">
                    <label class="form-check-label" for="narrow_specialistsOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="narrow_specialists" id="narrow_specialistsOption2" value="Нет">
                    <label class="form-check-label" for="narrow_specialistsOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="r_graphy"><b>Проведена R-графия: </b><span>(черепа, грудной клетки, костей таза, конечностей):</span></label><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="r_graphy" id="r_graphyOption1" value="Да">
                    <label class="form-check-label" for="r_graphyOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="r_graphy" id="r_graphyOption2" value="Нет">
                    <label class="form-check-label" for="r_graphyOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="conducted_ultrasound"><b>Проведено УЗС </b><span>(плевральныйх и брюшной полостей, забрюшинного пространства):</span></label><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="conducted_ultrasound" id="conducted_ultrasoundOption1" value="Да">
                    <label class="form-check-label" for="conducted_ultrasoundOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="conducted_ultrasound" id="conducted_ultrasoundOption2" value="Нет">
                    <label class="form-check-label" for="conducted_ultrasoundOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="msct"><b>Проведено МКСТ </b><span>(всего тела "full body"):</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msct" id="msctOption1" value="Да">
                    <label class="form-check-label" for="msctOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msct" id="msctOption2" value="Нет">
                    <label class="form-check-label" for="msctOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="msct_individual_parts"><b>Проведено МКСТ </b><span>(отдельных частей тела):</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msct_individual_parts" id="msct_individual_partsOption1" value="Да">
                    <label class="form-check-label" for="msct_individual_partsOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msct_individual_parts" id="msct_individual_partsOption2" value="Нет">
                    <label class="form-check-label" for="msct_individual_partsOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="neutral_fats"><b>Содержание нейтральный жиров в крови и моче:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="neutral_fats" id="neutral_fatsOption1" value="Да">
                    <label class="form-check-label" for="мneutral_fatsOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="neutral_fats" id="neutral_fatsOption2" value="Нет">
                    <label class="form-check-label" for="neutral_fatsOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="analysis_of_hb_ht"><b>Проведен анализ Нв, Ht в динамике:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="analysis_of_hb_ht" id="analysis_of_hb_htOption1" value="Да">
                    <label class="form-check-label" for="analysis_of_hb_htOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="analysis_of_hb_ht" id="analysis_of_hb_htOption2" value="Нет">
                    <label class="form-check-label" for="analysis_of_hb_htOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="dynamic_uzs"><b>Проведено УЗС в динамике:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dynamic_uzs" id="dynamic_uzsOption1" value="Да">
                    <label class="form-check-label" for="dynamic_uzsOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dynamic_uzs" id="dynamic_uzsOption2" value="Нет">
                    <label class="form-check-label" for="dynamic_uzsOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="diagnostic_laparoscopy"><b>Диагностическая лапароскопия</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="diagnostic_laparoscopy" id="diagnostic_laparoscopyOption1" value="Да">
                    <label class="form-check-label" for="diagnostic_laparoscopyOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="diagnostic_laparoscopy" id="diagnostic_laparoscopyOption2" value="Нет">
                    <label class="form-check-label" for="diagnostic_laparoscopyOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="thoracocentesis"><b>Торакоцентез:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thoracocentesis" id="thoracocentesisOption1" value="Да">
                    <label class="form-check-label" for="thoracocentesisOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thoracocentesis" id="thoracocentesisOption2" value="Нет">
                    <label class="form-check-label" for="thoracocentesisOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="laparotomy"><b>Лапаратомия:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="laparotomy" id="laparotomyOption1" value="Да">
                    <label class="form-check-label" for="laparotomyOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="laparotomy" id="laparotomyOption2" value="Нет">
                    <label class="form-check-label" for="laparotomyOption2">Нет</label>
                </div>
            </div>
            <hr>

            <div class="form-group">
                <label for="thoracoscopy_thoracotomy"><b>Торакоскопия (торакотомия):</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thoracoscopy_thoracotomy" id="thoracoscopy_thoracotomyOption1" value="Да">
                    <label class="form-check-label" for="thoracoscopy_thoracotomyOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thoracoscopy_thoracotomy" id="thoracoscopy_thoracotomyOption2" value="Нет">
                    <label class="form-check-label" for="thoracoscopy_thoracotomyOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="osteosynthesis_of_fractures"><b>Остеосинтез переломов:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osteosynthesis_of_fractures" id="osteosynthesis_of_fracturesOption1" value="Да">
                    <label class="form-check-label" for="osteosynthesis_of_fracturesOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osteosynthesis_of_fractures" id="osteosynthesis_of_fracturesOption2" value="Нет">
                    <label class="form-check-label" for="osteosynthesis_of_fracturesOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="skull_trepanation"><b>Трепанация черепа:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="skull_trepanation" id="skull_trepanationOption1" value="Да">
                    <label class="form-check-label" for="skull_trepanationOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="skull_trepanation" id="skull_trepanationOption2" value="Нет">
                    <label class="form-check-label" for="skull_trepanationOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="physician_full_name">ФИО лечащего врача:</label><br>
                <input type="text" class="form-control" id="physician_full_name" name="physician_full_name">
            </div>
            <div class="form-group">
                <label for="stat_department_full_name">ФИО специалиста стат.отдела:</label>
                <input type="text" class="form-control" id="stat_department_full_name"
                    name="stat_department_full_name">
            </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </x-panel>
@endsection
