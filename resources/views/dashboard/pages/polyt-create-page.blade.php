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
            <div class="form-group">
                <label for="discharge_date">Кол-во к/дней</label>
                <input type="text" class="form-control" id="discharge_date" name="discharge_date">
            </div>

            <div class="form-group">
                <label for="discharge_date">Кол-во к/дней в отд. Реанимации</label>
                <input type="text" class="form-control" id="discharge_date" name="discharge_date">
            </div>

            <div class="form-group">
                <label for="treatment_result"><b>Исход лечения</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="treatment_result" id="outcomeOption1" value="Выписан">
                    <label class="form-check-label" for="outcomeOption1">Выписан</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="treatment_result" id="outcomeOption2" value="Летальный исход">
                    <label class="form-check-label" for="outcomeOption2">Летальный исход</label>
                </div>
            </div>
            <div class="form-group">
                <label for="discharge_date">Тяжесть состояния по TS (баллов)</label>
                <input type="text" class="form-control" id="discharge_date" name="discharge_date">
            </div>
            <div class="form-group">
                <label for="discharge_date">Тяжесть состояния по ISS (баллов)</label>
                <input type="text" class="form-control" id="discharge_date" name="discharge_date">
            </div>
            <hr>
            <div class="form-group">
                <label for="final_result"><b>Время поступления после получения травмы:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="final_result" id="overallOption1" value="ОИМ с Q">
                    <label class="form-check-label" for="overallOption1">до 1ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="final_result" id="overallOption2" value="Оим без Q">
                    <label class="form-check-label" for="overallOption2">1-3ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="final_result" id="overallOption3" value="Прогрессирующая стенокардия">
                    <label class="form-check-label" for="overallOption3">6-12ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="final_result" id="overallOption3" value="Прогрессирующая стенокардия">
                    <label class="form-check-label" for="overallOption3">12-24ч.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="final_result" id="overallOption3" value="Прогрессирующая стенокардия">
                    <label class="form-check-label" for="overallOption3">позже 24ч.</label>
                </div>
            </div>
            <div class="form-group">
                <label for="anginal_attack_date"><b>Механизм травмы</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginalOption1" value="до 6ч.">
                    <label class="form-check-label" for="anginalOption1">ДТП</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginalOption2" value="6-12ч.">
                    <label class="form-check-label" for="anginalOption2">Кататравма</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginalOption3" value="позже 12ч.">
                    <label class="form-check-label" for="anginalOption3">Производственная</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="anginal_attack_date" id="anginalOption3" value="позже 12ч.">
                    <label class="form-check-label" for="anginalOption3">Прочие</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Осмотр хирурга:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Осмотр нейрохирурга:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Осмотр травматолога:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Осмотр других узких специалистов:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Проведена R-графия: </b><span>(черепа, грудной клетки, костей таза, конечностей):</span></label><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Проведено УЗС </b><span>(плевральныйх и брюшной полостей, забрюшинного пространства):</span></label><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Проведено МКСТ </b><span>(всего тела "full body"):</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Проведено МКСТ </b><span>(отдельных частей тела;):</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Содержание нейтральный жиров в крови и моче:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Проведен анализ Нв, Ht в динамике:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Проведено УЗС в динамике:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Диагностическая лапароскопия</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Торакоскопия (торакотомия):</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Остеосинтез переломов:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="cta_invasive_angiography"><b>Трепанация черепа:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption1" value="Да">
                    <label class="form-check-label" for="urgentOption1">Да</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="cta_invasive_angiography" id="urgentOption2" value="Нет">
                    <label class="form-check-label" for="urgentOption2">Нет</label>
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
