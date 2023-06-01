@extends('dashboard.layouts.default')

@section('content')
    <x-panel title="Создать">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('acs.add') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="department">{{ __('validation.attributes.department') }}</label>
                <select class="form-control" id="department" name="department">
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
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">Скорая</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Самотек</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Направление</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Исход лечения</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">Выписан</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Летальный исход</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Выписан в тяжелом состоянии</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Исход</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">ОИМ с Q</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Оим без Q</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Прогрессирующая стенокардия</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Срок ангинального приступа при поступлении</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">до 6ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">6-12ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">позже 12ч.</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Показана <span
                            style="font-weight: 900; background-color: yellow;">экстренная</span> ЧКВ/инвазивная
                        ангиография:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Экстренная ЧКВ выполнена <span
                            style="font-weight: 900; background-color: yellow;"> в течении 90мин:</span></b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Показана <span
                            style="font-weight: 900; background-color: yellow;">отсроченная</span> ЧКВ выполнена/инвазивная
                        ангиография:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Отсроченная ЧКВ выполнена:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Если не проведена ЧКВ, отметьте причину:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">медицинские противопоказания</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">отсутствие специалиста</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">отсутствие оборудования</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">занятость оборудования</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">отсутствие расходных материалов</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">отказ больного</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Показана ли тромболитическая терапия (ТЛТ):</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Если «Да», то проведена ли ТЛТ:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="column1"><b>Если «НЕТ», отметьте причину:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option1" value="option1">
                    <label class="form-check-label" for="column1Option1">медицинские противопоказания</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">отсутствие препарата</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="column1" id="column1Option2" value="option2">
                    <label class="form-check-label" for="column1Option2">отказ больного</label>
                </div>
            </div>
            <hr>
            <span><b> * Во время госпитализации больному (-ой):</b><span></span> <br><br>
                <div class="form-group">
                    <label for="column1"><b>Проведено <span style="font-weight: 900; background-color: yellow;"> ЭКГ
                            </span></b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">медицинские противопоказания</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">отсутствие препарата</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">отказ больного</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Если проведено ЭКГ, СТ сегмента повышен:</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Проведено ЭхоКГ, СТ сегмента повышен:</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Проведено ЭхоКГ (с оценкой ФВ ЛЖ%):</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Если «Да», то время первого измерения ФВ ЛЖ%</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">≤3 сутки</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">>3 суток</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Проведены анализы на ЛПНП</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Проведены анализ на АЧТВ (25-36сек)</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Проведена антикоагулянтная терапия:</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Принимал аспирин:</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Принимал ингибиторы P2Y12:</b></label><br>
                    <span>(prasugrel, ticagrelor, или clopidogrel)</span><br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Принимал статины высокой интенсивности:</b></label><br>
                    <span>(atorvastatin ⩾40 mg or rosuvastatin ⩾20 mg)</span><br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="column1"><b>Принимал ингибиторы АПФ или БРАII:</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option1"
                            value="option1">
                        <label class="form-check-label" for="column1Option1">Да</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="column1" id="column1Option2"
                            value="option2">
                        <label class="form-check-label" for="column1Option2">Нет</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="physician_full_name">ФИО лечащего врача:</label>
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
