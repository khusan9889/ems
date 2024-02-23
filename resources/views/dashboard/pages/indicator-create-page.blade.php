@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Создание новой медицинские данные/Yangi tibbiy ma'lumotlarni yarating">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ url('/indicator') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <form method="POST" action="{{ route('indicator.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                <tr>
                    <td>
                        <label>Область вызова/Viloyat</label>
                        <select class="form-control" required name="call_region_coato"
                                onchange="myFunction(this.value)">
                            <option></option>
                            @foreach ($regions as $key => $region)
                                <option
                                    value="{{ $region->coato }}" {{ old('call_region_coato') == $region->coato ? 'selected' : '' }}>
                                    {{ $region->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('call_region_coato')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </td>
                    <td>
                        <label>Подстанция принятия вызова/Chaqiruvlarni qabul qilish podstansiyasi</label>
                        <select class="form-control" required name="substation_id">
                            <option></option>
                            @foreach ($substations as $key => $substation)
                                <option
                                    value="{{ $substation->id }}" {{ old('substation_id') == $substation->id ? 'selected' : '' }}>
                                    {{ $substation->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('substation_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Место вызова/Chaqiruv joyi</label>
                        <select class="form-control" required name="call_place_id">
                            <option></option>
                            @foreach ($call_places as $key => $call_place)
                                <option
                                    value="{{ $call_place->id }}" {{ old('call_place_id') == $call_place->id ? 'selected' : '' }}>
                                    {{ $call_place->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('call_place_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </td>

                </tr>
                <tr>
                    <td>
                        <label>Заполнение карты вызова/Chaqiruv kartasini to'ldirish</label>
                        <select class="form-control" required name="filling_call_card">
                            <option></option>
                            <option value="1">
                                Да
                            </option>
                            <option value="0">
                                Нет
                            </option>
                        </select>
                    </td>
                    <td>
                        <label>Тип вызова/Chaqiruv turi</label>
                        <select class="form-control" required name="call_type_id">
                            <option></option>
                            @foreach ($call_types as $key => $call_type)
                                <option
                                    value="{{ $call_type->id }}" {{ old('call_type_id') == $call_type->id ? 'selected' : '' }}>
                                    {{ $call_type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('call_type_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Номер КВ/KV raqami</label>
                        <input type="text" name="card_number" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Дата приёма/Chaqiruvni qabul qilish sanasi</label>
                        <input type="date" name="call_received" value="<?php echo date('Y-m-d'); ?>"
                               class="form-control" required>
                    </td>
                    <td>
                        <label>Время приёма/Chaqiruvlarni qabul qilish vaqti</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d H:i') ?>" name="call_reception"
                               class="form-control" required>
                    </td>
                    <td>
                        <label>Вр. нач. форм. КТ/KT shakllanishining boshlanish vaqti</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d H:i') ?>"
                               name="beginning_formation_ct" class="form-control" required>
                    </td>
                </tr>
                <tr>

                    <td>
                        <label>Время передачи вызова бригаде/Chaqiruvni brigadaga o'tkazish vaqti</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d H:i') ?>" name="transfer_brigade"
                               class="form-control" required>
                    </td>
                    <td>
                        <label>Время выезда Бригады/Brigadaning ketish vaqti</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d H:i') ?>" name="brigade_departure"
                               class="form-control" required>
                    </td>

                    <td>
                        <label>Прибытие Бригады на место вызова/Brigadaning chaqiruv joyiga kelishi</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d H:i') ?>"
                               name="arrival_brigade_place" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Время началы транспортировки/Transportning boshlanish vaqti</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d H:i') ?>" name="transportation_start"
                               class="form-control" required>
                    </td>
                    <td>
                        <label>Время прибытия на мед. Учреждение/Tibbiyot markaziga kelish vaqti Tashkil etish</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d H:i') ?>"
                               name="arrival_medical_center" class="form-control" required>
                    </td>
                    <td>
                        <label>время завершения вызова/Chaqiruvlarni tugatish vaqti</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d H:i') ?>" name="call_end"
                               class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Время возвращения на подстанцию/Podstansiyaga qaytish vaqti</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d H:i') ?>" name="return_substation"
                               class="form-control">
                    </td>
                    <td>
                        <label>Бригада/Brigada</label>
                        <select class="form-control" required name="brigade_id">
                            <option></option>
                            @foreach ($brigades as $key => $brigade)
                                <option
                                    value="{{ $brigade->id }}" {{ old('brigade_id') == $brigade->id ? 'selected' : '' }}>
                                    {{ $brigade->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brigade_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Подробный адрес вызова/Chaqiruv manzili</label>
                        <input type="text" name="address" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Причина вызова/Chaqiruv qilish sababi</label>
                        <select class="form-control" required name="reason_id">
                            <option></option>
                            @foreach ($reasons as $key => $reason)
                                <option
                                    value="{{ $reason->id }}" {{ old('reason_id') == $reason->id ? 'selected' : '' }}>
                                    {{ $reason->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('reason_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Пол пациента/Bemor jinsi</label>
                        <select class="form-control" required name="gender">
                            <option></option>
                            <option value="Э/М" {{ old('gender')== "Э/М" ? 'selected' : '' }}>
                                Э/М
                            </option>
                            <option value="А/Ж" {{ old('gender')== "А/Ж" ? 'selected' : '' }}>
                                А/Ж
                            </option>
                            <option
                                value="Аникланмади/Не определен" {{ old('gender')== "Аникланмади/Не определен" ? 'selected' : '' }}>
                                Аникланмади/Не определен
                            </option>
                        </select>
                    </td>
                    <td>
                        <label>Возраст пациента/Bemorning yoshi</label>
                        <input type="number" name="age" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Диагноз по МКБ10/ICD 10 ga muvofiq diagnostika</label>
                        <input type="text" name="diagnos" class="form-control" required>
                    </td>
                    <td>
                        <label>Результат выезда/Ketish natijasi</label>
                        <select class="form-control" required name="call_result_id">
                            <option></option>
                            @foreach ($call_results as $key => $call_result)
                                <option
                                    value="{{ $call_result->id }}" {{ old('call_result_id') == $call_result->id ? 'selected' : '' }}>
                                    {{ $call_result->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('call_result_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Место госпитализации/Kasalxonaga yotqizilgan joy</label>
                        <select class="form-control" name="hospital_id">
                            <option></option>
                            @foreach ($hospitals as $key => $hospital)
                                <option
                                    value="{{ $hospital->id }}" {{ old('hospital_id') == $hospital->id ? 'selected' : '' }}>
                                    {{ $hospital->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('hospital_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Результат госпитализации/Kasalxonaga yotqizish natijasi</label>
                        <select class="form-control" name="hospitalization_result_id">
                            <option></option>
                            @foreach ($hospitalization_results as $key => $hospitalization_result)
                                <option
                                    value="{{ $hospitalization_result->id }}" {{ old('hospitalization_result_id') == $hospitalization_result->id ? 'selected' : '' }}>
                                    {{ $hospitalization_result->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('hospitalization_result_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Кто вызвал/Kim chaqirdi</label>
                        <select class="form-control" name="called_person_id">
                            <option></option>
                            @foreach ($called_persons as $key => $called_person)
                                <option
                                    value="{{ $called_person->id }}" {{ old('called_person_id') == $called_person->id ? 'selected' : '' }}>
                                    {{ $called_person->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('called_person_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Диагноз врача/Shifokor tashxisi</label>
                        <select class="form-control" name="diagnosis_id">
                            <option></option>
                            @foreach ($diagnoses as $key => $diagnosis)
                                <option
                                    value="{{ $diagnosis->id }}" {{ old('diagnosis_id') == $diagnosis->id ? 'selected' : '' }}>
                                    {{ $diagnosis->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('diagnosis_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="travel_time">Вр. доезда на выз./Yo'lga ketgan vaqt</label>
                        <input type="time" name="travel_time" class="form-control" required>
                    </td>
                    <td>
                        <label for="brigade_call_time">Вр.на прин.выз.бр./Birgada chaqiruvni qabul qilish vaqti</label>
                        <input type="time" name="brigade_call_time" class="form-control" required>
                    </td>
                </tr>
                </tbody>
            </table>
            <button type="submit" name="confirm_status" value="2" class="btn btn-primary fa-pull-right m-r-5">
                Тасдиқлаш учун тақдим этиш
            </button>
            <button type="submit" name="confirm_status" value="4" class="btn btn-primary fa-pull-right m-r-5">
                Ўзингиз учун сақлаш
            </button>

        </form>
    </x-panel>
@endsection
