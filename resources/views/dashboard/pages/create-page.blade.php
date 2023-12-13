@extends('dashboard.layouts.default')

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')
    <x-panel title="Регистр ОКС в СЭМП">

        <form action="{{ route('acs.add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="branch">Выбрать субъект СЭМП/Filialni tanlang</label>
                        <select class="form-control"  name="branch_id" onchange="myFunction(this.value)">
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
                        <label for="department">Выбрать отделение/Bo'limni tanlang</label>
                        <select class="form-control" id="mySelect" name="department_id">
                            <option value="" hidden>Выбрать отделение/Bo'limni tanlang</option>
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
                        <label for="history_disease">Номер истории болезни/Kasallik tarixi raqami</label>
                        <input type="text" class="form-control" id="history_disease" name="history_disease"
                            value="{{ old('history_disease') }}">
                        @error('history_disease')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="full_name">Пациент ФИО/Bemor to'liq FIO</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}">
                @error('full_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="hospitalization_date">Дата и время поступления/Qabul qilingan sana va vaqt</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                            </div>
                            <input class="form-control" id="hospitalization_calendar" type="datetime-local"
                                name="hospitalization_date" value="{{ old('hospitalization_date') }}">
                        </div>
                        @error('hospitalization_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="discharge_date">Дата выписки/Chiqarish sanasi</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                            </div>
                            <input class="form-control" id="discharge_calendar" type="datetime-local" name="discharge_date"
                                value="{{ old('discharge_date') }}">
                        </div>
                        @error('discharge_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="hospitalization_channels"><b>Канал госпитализации/Olib kelingan usuli</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalization_channels"
                        id="hospitalizationOption1" value="Скорая"
                        {{ old('hospitalization_channels') == 'Скорая' ? 'checked' : '' }}>
                    <label class="form-check-label" for="hospitalizationOption1">Скорая/TTYo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalization_channels"
                        id="hospitalizationOption2" value="Самотек"
                        {{ old('hospitalization_channels') == 'Самотек' ? 'checked' : '' }}>
                    <label class="form-check-label" for="hospitalizationOption2">Самотек/O’zi keldi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalization_channels"
                        id="hospitalizationOption3" value="Направление"
                        {{ old('hospitalization_channels') == 'Направление' ? 'checked' : '' }}>
                    <label class="form-check-label" for="hospitalizationOption3">Направление/Yo’llanma bilan</label>
                </div>
                @error('hospitalization_channels')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="treatment_result"><b>Исход лечения/Davolash natijasi</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="treatment_result" id="outcomeOption1"
                        value="Выписан" {{ old('treatment_result') == 'Выписан' ? 'checked' : '' }}>
                    <label class="form-check-label" for="outcomeOption1">Выписан/Chiqarilgan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="treatment_result" id="outcomeOption2"
                        value="Летальный исход" {{ old('treatment_result') == 'Летальный исход' ? 'checked' : '' }}>
                    <label class="form-check-label" for="outcomeOption2">Летальный исход/O’lgan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="treatment_result" id="outcomeOption3"
                        value="Выписан в тяжелом состоянии"
                        {{ old('treatment_result') == 'Выписан в тяжелом состоянии' ? 'checked' : '' }}>
                    <label class="form-check-label" for="outcomeOption3">Выписан в тяжелом состоянии/Og’ir axvolda berib yuborilgan</label>
                </div>
                @error('treatment_result')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="final_result"><b>Исход/Natija</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="final_result" id="overallOption1"
                        value="ОИМ с Q" {{ old('final_result') == 'ОИМ с Q' ? 'checked' : '' }}>
                    <label class="form-check-label" for="overallOption1">ОИМ с Q/Q-infarkt </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="final_result" id="overallOption2"
                        value="Оим без Q" {{ old('final_result') == 'Оим без Q' ? 'checked' : '' }}>
                    <label class="form-check-label" for="overallOption2">Оим без Q/Q-siz infarkt</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="final_result" id="overallOption3"
                        value="Прогрессирующая стенокардия"
                        {{ old('final_result') == 'Прогрессирующая стенокардия' ? 'checked' : '' }}>
                    <label class="form-check-label" for="overallOption3">Прогрессирующая стенокардия/Progressiv stenokardiya</label>
                </div>
                @error('final_result')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="anginal_attack_date"><b>Срок ангинального приступа при поступлении/Anginal huruj boshlanishidan to shifoxonaga kelguncha o’tgan vaqt</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginalOption1"
                        value="до 6ч." {{ old('anginal_attack_date') == 'до 6ч.' ? 'checked' : '' }}>
                    <label class="form-check-label" for="anginalOption1">до 6ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginalOption2"
                        value="6-12ч." {{ old('anginal_attack_date') == '6-12ч.' ? 'checked' : '' }}>
                    <label class="form-check-label" for="anginalOption2">6-12ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginalOption3"
                        value="позже 12ч." {{ old('anginal_attack_date') == 'позже 12ч.' ? 'checked' : '' }}>
                    <label class="form-check-label" for="anginalOption3">позже 12ч.</label>
                </div>
                @error('anginal_attack_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Показана экстренная ЧКВ/инвазивная ангиография/Shoshilinch koronarografiyaga ko’rsatma bormi:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1"
                        value="Да" {{ old('cta_invasive_angiography') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="urgentOption1">Да/Ha</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2"
                        value="Нет" {{ old('cta_invasive_angiography') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="urgentOption2">Нет/Yo'q</label>
                </div>
                @error('cta_invasive_angiography')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_90min"><b>Экстренная ЧКВ выполнена в течение 90 минут/Shoshilinch koronarografiya 90 daqiqa ichida o’tkasildimi:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_90min" id="cta_90minOption1"
                        value="Да" {{ old('cta_90min') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="cta_90minOption1">Да/Ha</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_90min" id="cta_90minOption2"
                        value="Нет" {{ old('cta_90min') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="cta_90minOption2">Нет/Yo'q</label>
                </div>
                @error('cta_90min')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="deferred_cta_invasive"><b>Показана отсроченная ЧКВ выполнена/инвазивная
                        ангиография/Kechiktirilgan koronarografiyaga ko’rsatma bormi:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="deferred_cta_invasive"
                        id="deferred_cta_invasiveOption1" value="Да"
                        {{ old('deferred_cta_invasive') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="deferred_cta_invasiveOption1">Да/Ha</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="deferred_cta_invasive"
                        id="deferred_cta_invasiveOption2" value="Нет"
                        {{ old('deferred_cta_invasive') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="deferred_cta_invasiveOption2">Нет/Yo'q</label>
                </div>
                @error('deferred_cta_invasive')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="deferred_cta_completed"><b>Отсроченная ЧКВ выполнена/Kechiktirilgan koronarografiya bajarildi:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="deferred_cta_completed"
                        id="deferred_cta_completedOption1" value="Да"
                        {{ old('deferred_cta_completed') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="deferred_cta_completedOption1">Да/Ha</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="deferred_cta_completed"
                        id="deferred_cta_completedOption2" value="Нет"
                        {{ old('deferred_cta_completed') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="deferred_cta_completedOption2">Нет/Yo'q</label>
                </div>
                @error('deferred_cta_completed')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="reasons_not_performing_cta"><b>Если не проведена ЧКВ, отметьте причину/Koronarografia o’tkazilmagan bo’lsa, sababini belgilang:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="reasons_not_performing_cta"
                        id="reasons_not_performing_ctaOption1" value="медицинские противопоказания"
                        {{ old('reasons_not_performing_cta') == 'медицинские противопоказания' ? 'checked' : '' }}>
                    <label class="form-check-label" for="reasons_not_performing_ctaOption1">медицинские
                        противопоказания/tibbiy qarshi ko’rsatma</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="reasons_not_performing_cta"
                        id="reasons_not_performing_ctaOption2" value="отсутствие специалиста"
                        {{ old('reasons_not_performing_cta') == 'отсутствие специалиста' ? 'checked' : '' }}>
                    <label class="form-check-label" for="reasons_not_performing_ctaOption2">отсутствие специалиста/mutaxassis yoqligi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="reasons_not_performing_cta"
                        id="reasons_not_performing_ctaOption3" value="отсутствие оборудования"
                        {{ old('reasons_not_performing_cta') == 'отсутствие оборудования' ? 'checked' : '' }}>
                    <label class="form-check-label" for="reasons_not_performing_ctaOption3">отсутствие
                        оборудования/uskuna yoqligi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="reasons_not_performing_cta"
                        id="reasons_not_performing_ctaOption4" value="занятость оборудования"
                        {{ old('reasons_not_performing_cta') == 'занятость оборудования' ? 'checked' : '' }}>
                    <label class="form-check-label" for="reasons_not_performing_ctaOption4">занятость оборудования/uskuna band bo’lgan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="reasons_not_performing_cta"
                        id="reasons_not_performing_ctaOption5" value="отсутствие расходных материалов"
                        {{ old('reasons_not_performing_cta') == 'отсутствие расходных материалов' ? 'checked' : '' }}>
                    <label class="form-check-label" for="reasons_not_performing_ctaOption5">отсутствие расходных
                        материалов/sarflanuvchi buyumlarning yoqligi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="reasons_not_performing_cta"
                        id="reasons_not_performing_ctaOption6" value="отказ больного"
                        {{ old('reasons_not_performing_cta') == 'отказ больного' ? 'checked' : '' }}>
                    <label class="form-check-label" for="reasons_not_performing_ctaOption6">отказ больного/bemor rozi bo’lmagan</label>
                </div>
                @error('reasons_not_performing_cta')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="thrombolytic_therapy"><b>Показана ли тромболитическая терапия (ТЛТ)/TLTga ko’rsatma bormi:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thrombolytic_therapy"
                        id="thrombolytic_therapyOption1" value="Да"
                        {{ old('thrombolytic_therapy') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="thrombolytic_therapyOption1">Да/Ha</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thrombolytic_therapy"
                        id="thrombolytic_therapyOption2" value="Нет"
                        {{ old('thrombolytic_therapy') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="thrombolytic_therapyOption2">Нет/Yo'q</label>
                </div>
                @error('thrombolytic_therapy')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="thrombolytic_therapy_administered"><b>Если «Да», то проведена ли ТЛТ/“Ha” bo’lsa, TLT o’kazildimi:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thrombolytic_therapy_administered"
                        id="thrombolytic_therapy_administeredOption1" value="Да"
                        {{ old('thrombolytic_therapy_administered') == 'Да' ? 'checked' : '' }}>
                    <label class="form-check-label" for="thrombolytic_therapy_administeredOption1">Да/Ha</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thrombolytic_therapy_administered"
                        id="thrombolytic_therapy_administeredOption2" value="Нет"
                        {{ old('thrombolytic_therapy_administered') == 'Нет' ? 'checked' : '' }}>
                    <label class="form-check-label" for="thrombolytic_therapy_administeredOption2">Нет/Yo'q</label>
                </div>
                @error('thrombolytic_therapy_administered')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="not_administering_tlt"><b>Если «НЕТ», отметьте причину/“Yoq” bolsa, sababini ko’rsating:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="not_administering_tlt"
                        id="not_administering_tltOption1" value="медицинские противопоказания"
                        {{ old('not_administering_tlt') == 'медицинские противопоказания' ? 'checked' : '' }}>
                    <label class="form-check-label" for="not_administering_tltOption1">медицинские
                        противопоказания/tibbiy qarshi ko’rsatma</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="not_administering_tlt"
                        id="not_administering_tltOption2" value="отсутствие препарата"
                        {{ old('not_administering_tlt') == 'отсутствие препарата' ? 'checked' : '' }}>
                    <label class="form-check-label" for="not_administering_tltOption2">отсутствие препарата/dorining yoqligi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="not_administering_tlt"
                        id="not_administering_tltOption3" value="отказ больного"
                        {{ old('not_administering_tlt') == 'отказ больного' ? 'checked' : '' }}>
                    <label class="form-check-label" for="not_administering_tltOption3">отказ больного/bemor rozi bo’lmagan</label>
                </div>
                @error('not_administering_tlt')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <span><b> * Во время госпитализации больному (-ой)/Shifoxonada bemorga:</b></span> <br><br>
                <div class="form-group">
                    <label for="ecg_during_hospitalization"><b>Проведено ЭКГ/EKG bajarilgan</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ecg_during_hospitalization"
                            id="ecg_during_hospitalizationOption1" value="Да"
                            {{ old('ecg_during_hospitalization') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ecg_during_hospitalizationOption1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ecg_during_hospitalization"
                            id="ecg_during_hospitalizationOption2" value="Нет"
                            {{ old('ecg_during_hospitalization') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ecg_during_hospitalizationOption1">Нет/Yo'q</label>
                    </div>
                    @error('ecg_during_hospitalization')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="st_segment"><b>Если проведено ЭКГ, СТ сегмента повышен/EKGda ST segment ko’tarilganmi:</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="st_segment" id="st_segmentOption1"
                            value="Да" {{ old('st_segment') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="st_segmentOption1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="st_segment" id="st_segmentOption2"
                            value="Нет" {{ old('st_segment') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="st_segmentOption2">Нет/Yo'q</label>
                    </div>
                    @error('st_segment')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="echocardiogram"><b>Проведено ЭхоКГ (с оценкой ФВ ЛЖ%)/EhoKG (ChQ OF(%)ni baholash bilan): </b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="echocardiogram" id="echocardiogramOption1"
                            value="Да" {{ old('echocardiogram') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="echocardiogramOption1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="echocardiogram" id="echocardiogramOption2"
                            value="Нет" {{ old('echocardiogram') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="echocardiogramOption2">Нет/Yo'q</label>
                    </div>
                    @error('echocardiogram')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="first_measurement"><b>Если «Да», то время первого измерения ФВ ЛЖ%/“Ha” bo’lsa, ChQ OF(%)ni ilk bora olchash muddati</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="first_measurement"
                            id="first_measurementOption1" value="≤3 сутки"
                            {{ old('first_measurement') == '≤3 сутки' ? 'checked' : '' }}>
                        <label class="form-check-label" for="first_measurementOption1">≤3 сутки/kun</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="first_measurement"
                            id="first_measurementOption2" value=">3 суток"
                            {{ old('first_measurement') == '>3 суток' ? 'checked' : '' }}>
                        <label class="form-check-label" for="first_measurementOption2">>3 суток/kun</label>
                    </div>
                    @error('first_measurement')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="cholestero_levels"><b>Проведены анализы на ЛПНП/Lipoproteidlarga tahlil qilindi</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cholestero_levels"
                            id="cholestero_levelsOption1" value="Да"
                            {{ old('cholestero_levels') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="cholestero_levelsOption1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cholestero_levels"
                            id="cholestero_levelsOption2" value="Нет"
                            {{ old('cholestero_levels') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="cholestero_levelsOption2">Нет/Yo'q</label>
                    </div>
                    @error('cholestero_levels')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="aptt"><b>Проведены анализ на АЧТВ (25-36сек)/FQTV tahlil qilindi (25-36сек)</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aptt" id="apttOption1" value="Да"
                            {{ old('aptt') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="apttOption1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aptt" id="apttOption2" value="Нет"
                            {{ old('aptt') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="apttOption2">Нет/Yo'q</label>
                    </div>
                    @error('aptt')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="anticoagulant"><b>Проведена антикоагулянтная терапия/Antikoagulyant davo o’tqazildi:</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="anticoagulant" id="anticoagulantOption1"
                            value="Да" {{ old('anticoagulant') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="anticoagulantOption1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="anticoagulant" id="anticoagulantOption2"
                            value="Нет" {{ old('anticoagulant') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="anticoagulantOption2">Нет/Yo'q</label>
                    </div>
                    @error('anticoagulant')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="aspirin"><b>Принимал аспирин/Aspirin qabul qildi:</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aspirin" id="aspirinOption1"
                            value="Да" {{ old('aspirin') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="aspirinOption1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aspirin" id="aspirinOption2"
                            value="Нет" {{ old('aspirin') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="aspirinOption2">Нет/Yo'q</label>
                    </div>
                    @error('aspirin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="p2y12"><b>Принимал ингибиторы P2Y12/P2Y12 ingibitorlarini qabul qildi:</b></label><br>
                    <span>(prasugrel, ticagrelor, или clopidogrel)</span><br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="p2y12" id="p2y12Option1" value="Да"
                            {{ old('p2y12') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="p2y12Option1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="p2y12" id="p2y12Option2" value="Нет"
                            {{ old('p2y12') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="p2y12Option2">Нет/Yo'q</label>
                    </div>
                    @error('p2y12')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="high_intensity_statins"><b>Принимал статины высокой интенсивности/Yuqori intensive statinlarni qabul qildi:</b></label><br>
                    <span>(atorvastatin ⩾40 mg or rosuvastatin ⩾20 mg)</span><br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="high_intensity_statins"
                            id="high_intensity_statinsOption1" value="Да"
                            {{ old('high_intensity_statins') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="high_intensity_statinsOption1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="high_intensity_statins"
                            id="high_intensity_statinsOption2" value="Нет"
                            {{ old('high_intensity_statins') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="high_intensity_statinsOption2">Нет/Yo'q</label>
                    </div>
                    @error('high_intensity_statins')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="ACE_inhibitors_ARBs"><b>Принимал ингибиторы АПФ или БРАII/Betablokatorlarni qabul qildi:</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ACE_inhibitors_ARBs"
                            id="ACE_inhibitors_ARBsOption1" value="Да"
                            {{ old('ACE_inhibitors_ARBs') == 'Да' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ACE_inhibitors_ARBsOption1">Да/Ha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ACE_inhibitors_ARBs"
                            id="ACE_inhibitors_ARBsOption2" value="Нет"
                            {{ old('ACE_inhibitors_ARBs') == 'Нет' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ACE_inhibitors_ARBsOption2">Нет/Yo'q</label>
                    </div>
                    @error('ACE_inhibitors_ARBs')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="physician_full_name">ФИО лечащего врача/Davolovchi shifokor:</label>
                    <input type="text" class="form-control" id="physician_full_name" name="physician_full_name"
                        value="{{ old('physician_full_name') }}">
                    @error('physician_full_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stat_department_full_name">ФИО специалиста стат.отдела/Statistika bo’limi mutaxassisi:</label>
                    <input type="text" class="form-control" id="stat_department_full_name"
                        name="stat_department_full_name" value="{{ old('stat_department_full_name') }}">
                    @error('stat_department_full_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            <button type="submit" name="confirm_status" value="2" class="btn btn-primary fa-pull-right m-r-5">Подача на одобрение</button>
            <button type="submit" name="confirm_status" value="4" class="btn btn-primary fa-pull-right m-r-5">Сохранять</button>
        </form>
    </x-panel>
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
   function myFunction(val) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `department_branch/${val}`);
        xhr.send();
        xhr.responseType = "json";
        xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
        var x = document.getElementById("mySelect");

        document.querySelectorAll('#mySelect option').forEach(option => option.remove())
            var option = document.createElement("option");
            for (const  object in xhr.response) {
              var option = document.createElement("option");
              option.text = xhr.response[object]['name'];
              option.value=xhr.response[object]['id'];
              x.add(option);
             }
        } else {
        console.log(`Error: ${xhr.status}`);
        }
        };
        }

    </script>
@endpush
