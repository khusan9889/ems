@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Создание новой медицинские данные">
        <form method="POST" action="{{ route('indicator.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                <tr>

                    <td>
                        <label>Область вызова</label>
                        <select class="form-control"  name="call_region_coato" readonly>
                            @foreach ($regions as $key => $region)
                                <option value="{{ $region->coato }}" {{ old('call_region_coato') == $region->coato ? 'selected' : '' }}>
                                    {{ $region->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('call_region_coato')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </td>
                    <td>
                        <label>Район вызова</label>

                        <select class="form-control"  name="call_district_coato" readonly>
                            @foreach ($districts as $key => $district)
                                <option value="{{ $district->coato }}" {{ old('call_district_coato') == $district->coato ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('call_district_coato')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </td>
                    <td>
                        <label>Подстанция принятия вызова</label>
                        <select class="form-control"  name="substation_id" readonly>
                            @foreach ($substations as $key => $substation)
                                <option value="{{ $substation->id }}" {{ old('substation_id') == $substation->id ? 'selected' : '' }}>
                                    {{ $substation->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('substation_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Заполнение карты вызова</label>
                        <select class="form-control"  name="filling_call_card" readonly>
                                <option value="1" {{ old('filling_call_card') == 1 ? 'selected' : '' }}>
                                    Истинный
                                </option>
                                <option value="0" {{ old('filling_call_card') == 0 ? 'selected' : '' }}>
                                    Ложный
                                </option>
                        </select>
                    </td>
                    <td>
                        <label>Тип вызова</label>
                        <select class="form-control"  name="call_type_id" readonly>
                            @foreach ($call_types as $key => $call_type)
                                <option value="{{ $call_type->id }}" {{ old('call_type_id') == $call_type->id ? 'selected' : '' }}>
                                    {{ $call_type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('call_type_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Номер КВ</label>
                        <input type="text" name="card_number" class="form-control" required>
                    </td>
                </tr>
                <tr>

                    <td>
                        <label>Дата приема вызова</label>
                        <input type="datetime-local" name="call_received" class="form-control" required>
                    </td>
                    <td>
                        <label>Время приема вызова</label>
                        <input type="datetime-local" name="call_reception" class="form-control" required>
                    </td>
                    <td>
                        <label>время началы формирования Карточки транспортировки (КТ)</label>
                        <input type="datetime-local" name="beginning_formation_ct" class="form-control" required>
                    </td>
                    <td>
                        <label>Время завершения формирования КТ</label>
                        <input type="datetime-local" name="completion_formation_ct" class="form-control" required>
                    </td>
                    <td>
                        <label>Время передачи вызова Бригаде</label>
                        <input type="datetime-local" name="transfer_brigade" class="form-control" required>
                    </td>
                    <td>
                        <label>Время выезда Бригады</label>
                        <input type="datetime-local" name="brigade_departure" class="form-control" required>
                    </td>
                </tr>
                <tr>

                    <td>
                        <label>Прибытие Бригады на место вызова</label>
                        <input type="datetime-local" name="arrival_brigade_place" class="form-control" required>
                    </td>
                    <td>
                        <label>Время началы транспортировки </label>
                        <input type="datetime-local" name="transportation_start" class="form-control" required>
                    </td>
                    <td>
                        <label>Время прибытия на мед. Учреждение</label>
                        <input type="datetime-local" name="arrival_medical_center" class="form-control" required>
                    </td>
                    <td>
                        <label>время завершения вызова</label>
                        <input type="datetime-local" name="call_end" class="form-control" required>
                    </td>
                    <td>
                        <label>Время возврашения на подстанцию</label>
                        <input type="datetime-local" name="return_substation" class="form-control" required>
                    </td>
                    <td>
                        <label>Название бригады</label>
                        <select class="form-control"  name="brigade_id" readonly>
                            @foreach ($brigades as $key => $brigade)
                                <option value="{{ $brigade->id }}" {{ old('brigade_id') == $brigade->id ? 'selected' : '' }}>
                                    {{ $brigade->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brigade_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>

                    <td>
                        <label>Подробный адрес вызова</label>
                        <input type="text" name="address" class="form-control" required>
                    </td>
                    <td>
                        <label>Причина вызова</label>
                        <select class="form-control"  name="reason_id" readonly>
                            @foreach ($reasons as $key => $reason)
                                <option value="{{ $reason->id }}" {{ old('reason_id') == $reason->id ? 'selected' : '' }}>
                                    {{ $reason->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('reason_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Пол пациента</label>
                        <select class="form-control"  name="gender" readonly>
                            <option value="Э/М" {{ old('gender')== "Э/М" ? 'selected' : '' }}>
                                Э/М
                            </option>
                            <option value="А/Ж" {{ old('gender')== "А/Ж" ? 'selected' : '' }}>
                                А/Ж
                            </option>
                            <option value="Аникланмади/Не определен" {{ old('gender')== "Аникланмади/Не определен" ? 'selected' : '' }}>
                                Аникланмади/Не определен
                            </option>
                        </select>
                    </td>
                    <td>
                        <label>Возраст пациента</label>
                        <input type="number" name="age" class="form-control" required>
                    </td>
                    <td>
                        <label>Область проживания пациента</label>

                        <select class="form-control"  name="residence_region_coato" readonly>
                            @foreach ($regions as $key => $region)
                                <option value="{{ $region->coato }}" {{ old('residence_region_coato') == $region->coato ? 'selected' : '' }}>
                                    {{ $region->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('residence_region_coato')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </td>
                    <td>
                        <label>Район проживания пациента</label>

                        <select class="form-control"  name="residence_district_coato" readonly>
                            @foreach ($districts as $key => $district)
                                <option value="{{ $district->coato }}" {{ old('residence_district_coato') == $district->coato ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('residence_district_coato')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>

                    <td>
                        <label>Диагноз по МКБ10</label>
                        <input type="text" name="diagnos" class="form-control" required>
                    </td>
                    <td>
                        <label>Результат выезда</label>
                        <select class="form-control"  name="call_result_id" readonly>
                            @foreach ($call_results as $key => $call_result)
                                <option value="{{ $call_result->id }}" {{ old('call_result_id') == $call_result->id ? 'selected' : '' }}>
                                    {{ $call_result->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('call_result_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Место госпитализации</label>
                        <select class="form-control"  name="hospital_id" readonly>
                            @foreach ($hospitals as $key => $hospital)
                                <option value="{{ $hospital->id }}" {{ old('hospital_id') == $hospital->id ? 'selected' : '' }}>
                                    {{ $hospital->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('hospital_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Результат госпитализации</label>
                        <select class="form-control"  name="hospitalization_result_id" readonly>
                            @foreach ($hospitalization_results as $key => $hospitalization_result)
                                <option value="{{ $hospitalization_result->id }}" {{ old('hospitalization_result_id') == $hospitalization_result->id ? 'selected' : '' }}>
                                    {{ $hospitalization_result->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('hospitalization_result_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Кто вызвал</label>
                        <select class="form-control"  name="called_person_id" readonly>
                            @foreach ($called_persons as $key => $called_person)
                                <option value="{{ $called_person->id }}" {{ old('called_person_id') == $called_person->id ? 'selected' : '' }}>
                                    {{ $called_person->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('called_person_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <label>Место вызова</label>
                        <select class="form-control"  name="call_place_id" readonly>
                            @foreach ($call_places as $key => $call_place)
                                <option value="{{ $call_place->id }}" {{ old('call_place_id') == $call_place->id ? 'selected' : '' }}>
                                    {{ $call_place->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('call_place_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </td>
                </tr>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary pull-right ">Создать</button>
        </form>
    </x-panel>
@endsection
