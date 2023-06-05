@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">ОКС-таблица для изменений</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Форма {{$data->id}}</h5>
                    <form method="POST" action="{{ route('update-data', ['id' => $data->id]) }}">
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
                                    <td>
                                        <select class="form-control" name="department">
                                            <!-- Add options for department -->
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}" {{ $data->department == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Номер ИБ</th>
                                    <td>
                                        <input type="text" name="final_result" value="{{$data->history_disease}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Пациент ФИО</th>
                                    <td>
                                        <input type="text" name="full_name" value="{{$data->full_name}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Дата поступления</th>
                                    <td>
                                        <input type="text" name="hospitalization_date" value="{{$data->hospitalization_date}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Дата выписки</th>
                                    <td>
                                        <input type="text" name="discharge_date" value="{{$data->discharge_date}}">
                                    </td>
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
                                

























                                <!-- Add more rows for radio questions -->
                                <tr>
                                    <th>ФИО лечащего врача</th>
                                    <td>
                                        <input type="text" name="physician_full_name" value="{{$data->physician_full_name}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>ФИО специалиста стат.отдела</th>
                                    <td>
                                        <input type="text" name="stat_department_full_name" value="{{$data->stat_department_full_name}}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection






                                <!-- Add more rows for other columns -->
                                {{-- <tr>
                                    <th>Исход лечения</th>
                                    <td>
                                        <select class="form-control" name="treatment_result">
                                            <option value="Выписан" {{ $data->treatment_result == 'Выписан' ? 'selected' : '' }}>Выписан</option>
                                            <option value="Летальный исход" {{ $data->treatment_result == 'Летальный исход' ? 'selected' : '' }}>Летальный исход</option>
                                            <option value="Выписан в тяжелом состоянии" {{ $data->treatment_result == 'Выписан в тяжелом состоянии' ? 'selected' : '' }}>Выписан в тяжелом состоянии</option>
                                        </select>
                                    </td>
                                </tr> --}}




                                {{-- <tr>
                                    <th>Срок ангинального приступа при поступлении</th>
                                    <td>
                                        <input type="text" name="anginal_attack_date" value="{{$data->anginal_attack_date}}">
                                    </td>
                                </tr> --}}
