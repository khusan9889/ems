@extends('dashboard.layouts.default')

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')
    <x-panel title="Регистр политравм в СЭМП">

        <form action="{{ route('polytrauma.add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="branch">Выбрать субъект СЭМП</label>
                        <select class="form-control" id="branch" name="branch_id" readonly>
                            <option value="" hidden>Выберите субъект</option>
                            @foreach ($branches as $key => $branch)
                                <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}
                                    @if (auth()->user()->branch_id == $branch->id) selected @endif>
                                    {{ $branch->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('branch_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="department">Выбрать отделение</label>
                        <select class="form-control" id="department" name="department_id">
                            <option value="" hidden>Выберите отделение</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @selected(old('department_id') == $department->id)>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group ml-auto">
                        <label for="history_disease">Номер Истории Болезни</label>
                        <input type="text" class="form-control" id="history_disease" name="history_disease"
                            value="{{ old('history_disease') }}">
                        @error('history_disease')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="full_name">Пациент ФИО</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}">
                @error('full_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="hospitalization_date">Дата и время поступления</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                            </div>
                            <input class="form-control" id="hospitalization_calendar" type="text"
                                name="hospitalization_date" value="{{ old('hospitalization_date') }}">
                        </div>
                        @error('hospitalization_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="discharge_date">Дата выписки</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                            </div>
                            <input class="form-control" id="discharge_calendar" type="text" name="discharge_date"
                                value="{{ old('discharge_date') }}">
                        </div>
                        @error('discharge_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="hospitalization_channels"><b>Канал госпитализации</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalization_channels"
                        id="hospitalizationOption1" value="Скорая"
                        {{ old('hospitalization_channels') == 'Скорая' ? 'checked' : '' }}>
                    <label class="form-check-label" for="hospitalizationOption1">Скорая</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalization_channels"
                        id="hospitalizationOption2" value="Самотек"
                        {{ old('hospitalization_channels') == 'Самотек' ? 'checked' : '' }}>
                    <label class="form-check-label" for="hospitalizationOption2">Самотек</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalization_channels"
                        id="hospitalizationOption3" value="Направление"
                        {{ old('hospitalization_channels') == 'Направление' ? 'checked' : '' }}>
                    <label class="form-check-label" for="hospitalizationOption3">Направление</label>
                </div>
                @error('hospitalization_channels')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="days_amount"><b>Кол-во к/дней</b></label>
                        <input type="text" class="form-control" id="days_amount" name="days_amount"
                            value="{{ old('days_amount') }}">
                        @error('days_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="days_in_intensive_care"><b>Кол-во к/дней в отд. Реанимации</b></label>
                        <input type="text" class="form-control" id="days_in_intensive_care"
                            name="days_in_intensive_care" value="{{ old('days_in_intensive_care') }}">
                        @error('days_in_intensive_care')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label for="treatment_result"><b>Исход лечения</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="treatment_result" id="treatment_resultOption1"
                        value="Выписан" {{ old('treatment_result') == 'Выписан' ? 'checked' : '' }}>
                    <label class="form-check-label" for="treatment_resultOption1">Выписан</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="treatment_result" id="treatment_resultOption2"
                        value="Летальный исход" {{ old('treatment_result') == 'Летальный исход' ? 'checked' : '' }}>
                    <label class="form-check-label" for="treatment_resultOption2">Летальный исход</label>
                </div>
                @error('treatment_result')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="severity_of_ts"><b>Тяжесть состояния по TS (баллов)</b></label>
                        <input type="text" class="form-control" id="severity_of_ts" name="severity_of_ts"
                            value="{{ old('severity_of_ts') }}">
                        @error('severity_of_ts')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="injury_of_iss"><b>Тяжесть состояния по ISS (баллов)</b></label>
                        <input type="text" class="form-control" id="injury_of_iss" name="injury_of_iss"
                            value="{{ old('injury_of_iss') }}">
                        @error('injury_of_iss')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="arrival_after_injury"><b>Время поступления после получения травмы:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury"
                        id="arrival_after_injuryOption1" value="до 1ч."
                        {{ old('arrival_after_injury') == 'до 1ч.' ? 'checked' : '' }}>
                    <label class="form-check-label" for="arrival_after_injuryOption1">до 1ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury"
                        id="arrival_after_injuryOption2" value="1-3ч."
                        {{ old('arrival_after_injury') == '1-3ч.' ? 'checked' : '' }}>
                    <label class="form-check-label" for="arrival_after_injuryOption2">1-3ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury"
                        id="arrival_after_injuryOption3" value="6-12ч."
                        {{ old('arrival_after_injury') == '6-12ч.' ? 'checked' : '' }}>
                    <label class="form-check-label" for="arrival_after_injuryOption3">6-12ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury"
                        id="arrival_after_injuryOption4" value="12-24ч."
                        {{ old('arrival_after_injury') == '12-24ч.' ? 'checked' : '' }}>
                    <label class="form-check-label" for="arrival_after_injuryOption4">12-24ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="arrival_after_injury"
                        id="arrival_after_injuryOption5" value="позже 24ч."
                        {{ old('arrival_after_injury') == 'позже 24ч.' ? 'checked' : '' }}>
                    <label class="form-check-label" for="arrival_after_injuryOption5">позже 24ч.</label>
                </div>
                @error('arrival_after_injury')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="mechanism_of_injury"><b>Механизм травмы</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="mechanism_of_injury"
                        id="mechanism_of_injuryOption1" value="ДТП"
                        {{ old('mechanism_of_injury') == 'ДТП' ? 'checked' : '' }}>
                    <label class="form-check-label" for="mechanism_of_injuryOption1">ДТП</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="mechanism_of_injury"
                        id="mechanism_of_injuryOption2" value="Кататравма"
                        {{ old('mechanism_of_injury') == 'Кататравма' ? 'checked' : '' }}>
                    <label class="form-check-label" for="mechanism_of_injuryOption2">Кататравма</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="mechanism_of_injury"
                        id="mechanism_of_injuryOption3" value="Производственная"
                        {{ old('mechanism_of_injury') == 'Производственная' ? 'checked' : '' }}>
                    <label class="form-check-label" for="mechanism_of_injuryOption3">Производственная</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="mechanism_of_injury"
                        id="mechanism_of_injuryOption4" value="Прочие"
                        {{ old('mechanism_of_injury') == 'Прочие' ? 'checked' : '' }}>
                    <label class="form-check-label" for=mechanism_of_injuryOption4">Прочие</label>
                </div>
                @error('mechanism_of_injury')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="survey_of_surgeon"><b>Осмотр хирурга:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_surgeon"
                        id="urgesurvey_of_surgeonOption1ntOption1" value="Да"
                        {{ old('survey_of_surgeon') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="survey_of_surgeonOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_surgeon"
                        id="survey_of_surgeonOption2" value="Нет"
                        {{ old('survey_of_surgeon') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="survey_of_surgeonOption2">Нет</label>
                </div>
                @error('survey_of_surgeon')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="survey_of_neurosurgeon"><b>Осмотр нейрохирурга:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_neurosurgeon"
                        id="survey_of_neurosurgeonOption1" value="Да"
                        {{ old('survey_of_neurosurgeon') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="survey_of_neurosurgeonOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_neurosurgeon"
                        id="survey_of_neurosurgeonOption2" value="Нет"
                        {{ old('survey_of_neurosurgeon') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="survey_of_neurosurgeonOption2">Нет</label>
                </div>
                @error('survey_of_neurosurgeon')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="survey_of_traumatologist"><b>Осмотр травматолога:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_traumatologist"
                        id="survey_of_traumatologistOption1" value="Да"
                        {{ old('survey_of_traumatologist') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="survey_of_traumatologistOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="survey_of_traumatologist"
                        id="survey_of_traumatologistOption2" value="Нет"
                        {{ old('survey_of_traumatologist') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="survey_of_traumatologistOption2">Нет</label>
                </div>
                @error('survey_of_traumatologist')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="narrow_specialists"><b>Осмотр других узких специалистов:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="narrow_specialists"
                        id="narrow_specialistsOption1" value="Да"
                        {{ old('narrow_specialists') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="narrow_specialistsOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="narrow_specialists"
                        id="narrow_specialistsOption2" value="Нет"
                        {{ old('narrow_specialists') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="narrow_specialistsOption2">Нет</label>
                </div>
                @error('narrow_specialists')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="r_graphy"><b>Проведена R-графия: </b><span>(черепа, грудной клетки, костей таза,
                        конечностей):</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="r_graphy" id="r_graphyOption1" value="Да"
                        {{ old('r_graphy') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="r_graphyOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="r_graphy" id="r_graphyOption2" value="Нет"
                        {{ old('r_graphy') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="r_graphyOption2">Нет</label>
                </div>
                @error('r_graphy')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="conducted_ultrasound"><b>Проведено УЗС </b><span>(плевральных и брюшной полостей, забрюшинного
                        пространства):</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="conducted_ultrasound"
                        id="conducted_ultrasoundOption1" value="Да"
                        {{ old('conducted_ultrasound') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="conducted_ultrasoundOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="conducted_ultrasound"
                        id="conducted_ultrasoundOption2" value="Нет"
                        {{ old('conducted_ultrasound') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="conducted_ultrasoundOption2">Нет</label>
                </div>
                @error('conducted_ultrasound')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="msct"><b>Проведено МКСТ </b><span>(всего тела):</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msct" id="msctOption1" value="Да"
                        {{ old('msct') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="msctOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msct" id="msctOption2" value="Нет"
                        {{ old('msct') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="msctOption2">Нет</label>
                </div>
                @error('msct')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="msct_individual_parts"><b>Проведено МКСТ </b><span>(отдельных частей тела):</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msct_individual_parts"
                        id="msct_individual_partsOption1" value="Да"
                        {{ old('msct_individual_parts') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="msct_individual_partsOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msct_individual_parts"
                        id="msct_individual_partsOption2" value="Нет"
                        {{ old('msct_individual_parts') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="msct_individual_partsOption2">Нет</label>
                </div>
                @error('msct_individual_parts')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="neutral_fats"><b>Содержание нейтральный жиров в крови и моче:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="neutral_fats" id="neutral_fatsOption1"
                        value="Да" {{ old('neutral_fats') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="мneutral_fatsOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="neutral_fats" id="neutral_fatsOption2"
                        value="Нет" {{ old('neutral_fats') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="neutral_fatsOption2">Нет</label>
                </div>
                @error('neutral_fats')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="analysis_of_hb_ht"><b>Проведен анализ Нв, Ht в динамике:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="analysis_of_hb_ht"
                        id="analysis_of_hb_htOption1" value="Да"
                        {{ old('analysis_of_hb_ht') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="analysis_of_hb_htOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="analysis_of_hb_ht"
                        id="analysis_of_hb_htOption2" value="Нет"
                        {{ old('analysis_of_hb_ht') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="analysis_of_hb_htOption2">Нет</label>
                </div>
                @error('analysis_of_hb_ht')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="dynamic_uzs"><b>Проведено УЗС в динамике:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dynamic_uzs" id="dynamic_uzsOption1"
                        value="Да" {{ old('dynamic_uzs') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="dynamic_uzsOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dynamic_uzs" id="dynamic_uzsOption2"
                        value="Нет" {{ old('dynamic_uzs') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="dynamic_uzsOption2">Нет</label>
                </div>
                @error('dynamic_uzs')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="diagnostic_laparoscopy"><b>Диагностическая лапароскопия</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="diagnostic_laparoscopy"
                        id="diagnostic_laparoscopyOption1" value="Да"
                        {{ old('diagnostic_laparoscopy') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="diagnostic_laparoscopyOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="diagnostic_laparoscopy"
                        id="diagnostic_laparoscopyOption2" value="Нет"
                        {{ old('diagnostic_laparoscopy') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="diagnostic_laparoscopyOption2">Нет</label>
                </div>
                @error('diagnostic_laparoscopy')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="thoracocentesis"><b>Торакоцентез:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thoracocentesis" id="thoracocentesisOption1"
                        value="Да" {{ old('thoracocentesis') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="thoracocentesisOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thoracocentesis" id="thoracocentesisOption2"
                        value="Нет" {{ old('thoracocentesis') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="thoracocentesisOption2">Нет</label>
                </div>
                @error('thoracocentesis')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="laparotomy"><b>Лапаратомия:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="laparotomy" id="laparotomyOption1"
                        value="Да" {{ old('laparotomy') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="laparotomyOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="laparotomy" id="laparotomyOption2"
                        value="Нет" {{ old('laparotomy') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="laparotomyOption2">Нет</label>
                </div>
                @error('laparotomy')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>

            <div class="form-group">
                <label for="thoracoscopy_thoracotomy"><b>Торакоскопия (торакотомия):</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thoracoscopy_thoracotomy"
                        id="thoracoscopy_thoracotomyOption1" value="Да"
                        {{ old('thoracoscopy_thoracotomy') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="thoracoscopy_thoracotomyOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thoracoscopy_thoracotomy"
                        id="thoracoscopy_thoracotomyOption2" value="Нет"
                        {{ old('thoracoscopy_thoracotomy') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="thoracoscopy_thoracotomyOption2">Нет</label>
                </div>
                @error('thoracoscopy_thoracotomy')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="osteosynthesis_of_fractures"><b>Остеосинтез переломов:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osteosynthesis_of_fractures"
                        id="osteosynthesis_of_fracturesOption1" value="Да"
                        {{ old('osteosynthesis_of_fractures') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="osteosynthesis_of_fracturesOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osteosynthesis_of_fractures"
                        id="osteosynthesis_of_fracturesOption2" value="Нет"
                        {{ old('osteosynthesis_of_fractures') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="osteosynthesis_of_fracturesOption2">Нет</label>
                </div>
                @error('osteosynthesis_of_fractures')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="skull_trepanation"><b>Трепанация черепа:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="skull_trepanation"
                        id="skull_trepanationOption1" value="Да"
                        {{ old('skull_trepanation') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="skull_trepanationOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="skull_trepanation"
                        id="skull_trepanationOption2" value="Нет"
                        {{ old('skull_trepanation') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="skull_trepanationOption2">Нет</label>
                </div>
                @error('skull_trepanation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="physician_full_name">ФИО лечащего врача:</label><br>
                <input type="text" class="form-control" id="physician_full_name" name="physician_full_name"
                    value="{{ old('physician_full_name') }}">
                @error('physician_full_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="stat_department_full_name">ФИО специалиста стат.отдела:</label>
                <input type="text" class="form-control" id="stat_department_full_name"
                    name="stat_department_full_name" value="{{ old('stat_department_full_name') }}">
                @error('stat_department_full_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </x-panel>
@endsection


@push('custom_js')
    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('#hospitalization_calendar').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "locale": {
                format: 'DD.MM.YYYY HH:mm',
                "separator": " - ",
                "applyLabel": "Применить",
                "cancelLabel": "Отменить",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ],
                "monthNames": [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
                "firstDay": 1
            },
        }, function(start, end, label) {
            $('#hospitalization_calendar').val(start.format('DD.MM.YYYY HH:mm'));
        });

        $('#discharge_calendar').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "locale": {
                format: 'DD.MM.YYYY HH:mm',
                "separator": " - ",
                "applyLabel": "Применить",
                "cancelLabel": "Отменить",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ],
                "monthNames": [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
                "firstDay": 1
            },
        }, function(start, end, label) {
            $('#discharge_calendar').val(start.format('DD.MM.YYYY HH:mm'));
        });

        let departments = [];
        const branch = document.getElementById('branch')
        const fetchDepartmentsByBranchId = async function(value) {
            try {
                // const target = event.target

                const res = await axios({
                    url: '/departments/branch',
                    params: {
                        branch_id: Number(value)
                    }
                })

                departments = res.data

                const department = document.getElementById('department')

                department.innerHTML = '<option value="" hidden>Выберите отделение</option>'
                departments.forEach(dep => {
                    const optEl = document.createElement('option')
                    optEl.value = dep.id
                    optEl.innerHTML = dep.name
                    department.insertAdjacentElement('beforeend', optEl)
                })
            } catch (error) {
                alert(error.message)
            }

        }
        branch.addEventListener('change', (event) => fetchDepartmentsByBranchId(event.target.value))
        window.addEventListener('DOMContentLoaded', function(event) {
            const selectedBranch = document.getElementById('branch')
            console.log('selectedBranch id: ', selectedBranch.value);
            fetchDepartmentsByBranchId(selectedBranch.value)
        })
    </script>
@endpush
