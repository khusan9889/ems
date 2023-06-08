@extends('dashboard.layouts.default')
@section('content')
    <h1 class="page-header">ОКС-таблица для изменений</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Форма {{$data->id}}</h5>
                        <a href="{{ url('/') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                        <form id="saveForm" method="POST" action="{{ route('update-data', ['id' => $data->id]) }}">
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
                                    <td>{{$data->branch->name}}</td>
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
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="treatment_result" id="treatment_resultOption3" value="Выписан в тяжелом состоянии" {{ $data->treatment_result == 'Выписан в тяжелом состоянии' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="treatment_resultOption3">Выписан в тяжелом состоянии</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Исход</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="final_result" id="final_resultOption1" value="ОИМ с Q" {{ $data->final_result == 'ОИМ с Q' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="final_resultOption1">ОИМ с Q</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="final_result" id="final_resultOption2" value="Оим без Q" {{ $data->final_result == 'Оим без Q' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="final_resultOption2">Оим без Q</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="final_result" id="final_resultOption3" value="Прогрессирующая стенокардия" {{ $data->final_result == 'Прогрессирующая стенокардия' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="final_resultOption3">Прогрессирующая стенокардияи</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Срок ангинального приступа при поступлении</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginal_attack_dateOption1" value="до 6ч." {{ $data->anginal_attack_date == 'до 6ч.' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="anginal_attack_dateOption1">до 6ч.</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginal_attack_dateOption2" value="6-12ч." {{ $data->anginal_attack_date == '6-12ч.' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="anginal_attack_dateOption2">6-12ч.</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginal_attack_dateOption3" value="позже 12ч." {{ $data->anginal_attack_date == 'позже 12ч.' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="anginal_attack_dateOption3">позже 12ч.</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Показана экстренная ЧКВ/инвазивная ангиография?</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="ctaInvasiveAngiographyOption1" value="Да" {{ $data->cta_invasive_angiography == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="ctaInvasiveAngiographyOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="ctaInvasiveAngiographyOption2" value="Нет" {{ $data->cta_invasive_angiography == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="ctaInvasiveAngiographyOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Экстренная ЧКВ выполнена в течение 90 минут:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cta_90min" id="cta_90minOption1" value="Да" {{ $data->cta_90min == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="cta_90minOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cta_90min" id="cta_90minOption2" value="Нет" {{ $data->cta_90min == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="cta_90minOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Показана отсроченная ЧКВ выполнена/инвазивная ангиография:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="deferred_cta_invasive" id="deferred_cta_invasiveOption1" value="Да" {{ $data->deferred_cta_invasive == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="deferred_cta_invasiveOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="deferred_cta_invasive" id="deferred_cta_invasiveOption2" value="Нет" {{ $data->deferred_cta_invasive == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="deferred_cta_invasiveOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Отсроченная ЧКВ выполнена:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="deferred_cta_completed" id="deferred_cta_completedOption1" value="Да" {{ $data->deferred_cta_completed == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="deferred_cta_completedOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="deferred_cta_completed" id="deferred_cta_completedOption2" value="Нет" {{ $data->deferred_cta_completed == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="deferred_cta_completedOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Если не проведена ЧКВ, отметьте причину:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reasons_not_performing_cta" id="reasons_not_performing_ctaOption1" value="медицинские противопоказания" {{ $data->reasons_not_performing_cta == 'медицинские противопоказания' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reasons_not_performing_ctaOption1">медицинские противопоказания</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reasons_not_performing_cta" id="reasons_not_performing_ctaOption2" value="отсутствие специалиста" {{ $data->reasons_not_performing_cta == 'отсутствие специалиста' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reasons_not_performing_ctaOption2">отсутствие специалиста</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reasons_not_performing_cta" id="reasons_not_performing_ctaOption3" value="отсутствие оборудования" {{ $data->reasons_not_performing_cta == 'отсутствие оборудования' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reasons_not_performing_ctaOption3">отсутствие оборудования</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reasons_not_performing_cta" id="reasons_not_performing_ctaOption4" value="занятость оборудования" {{ $data->reasons_not_performing_cta == 'занятость оборудования' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reasons_not_performing_ctaOption4">занятость оборудования</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reasons_not_performing_cta" id="reasons_not_performing_ctaOption5" value="отсутствие расходных материалов" {{ $data->reasons_not_performing_cta == 'отсутствие расходных материалов' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reasons_not_performing_ctaOption5">отсутствие расходных материалов</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reasons_not_performing_cta" id="reasons_not_performing_ctaOption6" value="отказ больного" {{ $data->reasons_not_performing_cta == 'отказ больного' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reasons_not_performing_ctaOption6">отказ больного</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Показана ли тромболитическая терапия (ТЛТ):</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="thrombolytic_therapy" id="thrombolytic_therapyOption1" value="Да" {{ $data->thrombolytic_therapy == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="thrombolytic_therapyOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="thrombolytic_therapy" id="thrombolytic_therapyOption2" value="Нет" {{ $data->thrombolytic_therapy == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="thrombolytic_therapyOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Если «Да», то проведена ли ТЛТ:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="thrombolytic_therapy_administered" id="thrombolytic_therapy_administeredOption1" value="Да" {{ $data->thrombolytic_therapy_administered == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="thrombolytic_therapy_administeredOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="thrombolytic_therapy_administered" id="thrombolytic_therapy_administeredOption2" value="Нет" {{ $data->thrombolytic_therapy_administered == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="thrombolytic_therapy_administeredOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Если «НЕТ», отметьте причину:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="not_administering_tlt" id="not_administering_tltOption1" value="медицинские противопоказания" {{ $data->not_administering_tlt == 'медицинские противопоказания' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="not_administering_tltOption1">медицинские противопоказания</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="not_administering_tlt" id="not_administering_tltOption2" value="отсутствие препарата" {{ $data->not_administering_tlt == 'отсутствие препарата' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="not_administering_tltOption2">отсутствие препарата</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="not_administering_tlt" id="not_administering_tltOption3" value="отказ больного" {{ $data->not_administering_tlt == 'отказ больного' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="not_administering_tltOption3">отказ больного</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>

                                    <th><span><b> * Во время госпитализации больному (-ой):</b><span></span> <br>
                                        Проведено ЭКГ</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ecg_during_hospitalization" id="ecg_during_hospitalizationOption1" value="Да" {{ $data->ecg_during_hospitalization == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="ecg_during_hospitalizationOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ecg_during_hospitalization" id="ecg_during_hospitalizationOption2" value="Нет" {{ $data->ecg_during_hospitalization == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="ecg_during_hospitalizationOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Если проведено ЭКГ, СТ сегмента повышен:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="st_segment" id="st_segmentOption1" value="Да" {{ $data->st_segment == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="st_segmentOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="st_segment" id="st_segmentOption2" value="Нет" {{ $data->st_segment == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="st_segmentOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведено ЭхоКГ (с оценкой ФВ ЛЖ%):</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="echocardiogram" id="echocardiogramOption1" value="Да" {{ $data->echocardiogram == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="echocardiogramOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="echocardiogram" id="echocardiogramOption2" value="Нет" {{ $data->echocardiogram == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="echocardiogramOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Если «Да», то время первого измерения ФВ ЛЖ%</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="first_measurement" id="first_measurementOption1" value="≤3 сутки" {{ $data->first_measurement == '≤3 сутки' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="first_measurementOption1">≤3 сутки</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="first_measurement" id="first_measurementOption2" value=">3 суток" {{ $data->first_measurement == '>3 суток' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="first_measurementOption2">>3 суток</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведены анализы на ЛПНП</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cholestero_levels" id="cholestero_levelsOption1" value="Да" {{ $data->cholestero_levels == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="cholestero_levelsOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cholestero_levels" id="cholestero_levelsOption2" value="Нет" {{ $data->cholestero_levels == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="cholestero_levelsOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведены анализ на АЧТВ (25-36сек)</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="aptt" id="apttOption1" value="Да" {{ $data->aptt == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="apttOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="aptt" id="apttOption2" value="Нет" {{ $data->aptt == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="apttOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Проведена антикоагулянтная терапия:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="anticoagulant" id="anticoagulantOption1" value="Да" {{ $data->anticoagulant == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="anticoagulantOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="anticoagulant" id="anticoagulantOption2" value="Нет" {{ $data->anticoagulant == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="anticoagulantOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Принимал аспирин:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="aspirin" id="aspirinOption1" value="Да" {{ $data->aspirin == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="aspirinOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="aspirin" id="aspirinOption2" value="Нет" {{ $data->aspirin == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="aspirinOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Принимал ингибиторы P2Y12:
                                        <br><span>(prasugrel, ticagrelor, или clopidogrel)</span><br>
                                    </th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="p2y12" id="p2y12Option1" value="Да" {{ $data->p2y12 == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="p2y12Option1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="p2y12" id="p2y12Option2" value="Нет" {{ $data->p2y12 == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="p2y12Option2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Принимал статины высокой интенсивности:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="high_intensity_statins" id="high_intensity_statinsOption1" value="Да" {{ $data->high_intensity_statins == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="high_intensity_statinsOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="high_intensity_statins" id="high_intensity_statinsOption2" value="Нет" {{ $data->high_intensity_statins == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="high_intensity_statinsOption2">Нет</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Принимал ингибиторы АПФ или БРАII:</th>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ACE_inhibitors_ARBs" id="ACE_inhibitors_ARBsOption1" value="Да" {{ $data->ACE_inhibitors_ARBs == 'Да' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="ACE_inhibitors_ARBsOption1">Да</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ACE_inhibitors_ARBs" id="ACE_inhibitors_ARBsOption2" value="Нет" {{ $data->ACE_inhibitors_ARBs == 'Нет' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="ACE_inhibitors_ARBsOption2">Нет</label>
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

