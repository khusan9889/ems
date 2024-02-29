@php use Carbon\Carbon; @endphp
@extends('dashboard.layouts.default')
@section('content')
    <x-panel title="Таҳрирлаш/Редактировать">
    <form method="POST" action="{{ route('indicator.update', ['id' => $indicator->id]) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
                            <tr>
                                <td>
                                    <label>Область вызова</label>
                                    <select class="form-control" required name="call_region_coato"
                                            onchange="myFunction(this.value)">
                                        <option></option>

                                        @foreach ($regions as $key => $region)
                                            <option
                                                value="{{ $region->coato }}" {{$indicator->call_region_coato==$region->coato ? 'selected' : '' }}>
                                                {{ $region->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('call_region_coato')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <label>Подстанция принятия вызова</label>
                                    <select class="form-control" required name="substation_id">
                                        <option></option>
                                        @foreach ($substations as $key => $substation)
                                            <option
                                                value="{{ $substation->id }}" {{ $indicator->substation_id == $substation->id ? 'selected' : '' }}>
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
                                    <select class="form-control"  name="filling_call_card">
                                        <option></option>
                                        <option value="1" {{ $indicator->filling_call_card  == 1 ? 'selected' : '' }}>
                                            Истинный
                                        </option>
                                        <option value="0" {{ $indicator->filling_call_card == 0 ? 'selected' : '' }}>
                                            Ложный
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Тип вызова </label>
                                    <select class="form-control"  name="call_type_id">
                                        <option></option>
                                        @foreach ($call_types as $key => $call_type)
                                            <option
                                                value="{{ $call_type->id }}" {{ $indicator->call_type_id == $call_type->id ? 'selected' : '' }}>
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
                                    <input type="text" name="card_number" class="form-control"
                                           value="{{$indicator->card_number}}">
                                </td>
                                <td>
                                    <label>Дата приёма</label>
                                    <input type="date"
                                           value="{{ Carbon::parse($indicator->call_received)->isoFormat('YYYY-MM-DD')}}"
                                           name="call_received" class="form-control" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Время приёма</label>
                                    <input type="datetime-local"
                                           value="{{ $indicator->call_reception }}"
                                           name="call_reception" class="form-control" >
                                </td>
                                <td>
                                    <label>Вр. нач. форм. КТ</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->beginning_formation_ct}}"
                                           name="beginning_formation_ct" class="form-control" >
                                </td>
                                <td>
                                    <label>Время передачи вызова бригаде</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->transfer_brigade}}"
                                           name="transfer_brigade" class="form-control" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Время выезда бригады.</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->brigade_departure}}"
                                           name="brigade_departure" class="form-control" >
                                </td>
                                <td>
                                    <label>Прибытие Бригады на место вызова</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->arrival_brigade_place}}"
                                           name="arrival_brigade_place" class="form-control" >
                                </td>
                                <td>
                                    <label>Время началы транспортировки</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->transportation_start}}"
                                           name="transportation_start" class="form-control" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Время прибытия на мед. Учреждение</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->arrival_medical_center}}"
                                           name="arrival_medical_center" class="form-control" >
                                </td>
                                <td>
                                    <label>время завершения вызова</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->call_end}}"
                                           name="call_end" class="form-control" >
                                </td>
                                <td>
                                    <label>Время возвращения на подстанцию </label>
                                    <input type="datetime-local"
                                           value="{{$indicator->return_substation}}"
                                           name="return_substation" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Бригада</label>
                                    <select class="form-control"  name="brigade_id">
                                        <option></option>
                                        @foreach ($brigades as $key => $brigade)
                                            <option
                                                value="{{ $brigade->id }}" {{ $indicator->brigade_id == $brigade->id ? 'selected' : '' }}>
                                                {{ $brigade->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brigade_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <label>Подробный адрес вызова</label>
                                    <input type="text" name="address" class="form-control"
                                           value="{{$indicator->address}}">
                                </td>
                                <td>
                                    <label>Причина вызова</label>
                                    <select class="form-control"  name="reason_id">
                                        <option></option>
                                        @foreach ($reasons as $key => $reason)
                                            <option
                                                value="{{ $reason->id }}" {{ $indicator->reason_id == $reason->id ? 'selected' : '' }}>
                                                {{ $reason->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('reason_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Пол пациента</label>
                                    <select class="form-control"  name="gender">
                                        <option></option>
                                        <option value="Э/М" {{ $indicator->gender == "Э/М" ? 'selected' : '' }}>
                                            Э/М
                                        </option>
                                        <option value="А/Ж" {{ $indicator->gender == "А/Ж" ? 'selected' : '' }}>
                                            А/Ж
                                        </option>
                                        <option
                                            value="Аникланмади/Не определен" {{ $indicator->gender == "Аникланмади/Не определен" ? 'selected' : '' }}>
                                            Аникланмади/Не определен
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <label>Возраст пациента</label>
                                    <input type="number" name="age" class="form-control"
                                           value="{{$indicator->age}}"
                                           min="0">
                                </td>
                                <td>
                                    <label>Диагноз по МКБ10</label>
                                    <input type="text" name="diagnos" class="form-control"
                                           value="{{$indicator->diagnos}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Результат выезда</label>
                                    <select class="form-control"  name="call_result_id">
                                        <option></option>
                                        @foreach ($call_results as $key => $call_result)
                                            <option
                                                value="{{ $call_result->id }}" {{ $indicator->call_result_id == $call_result->id ? 'selected' : '' }}>
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
                                    <select class="form-control" name="hospital_id">
                                        <option></option>
                                        @foreach ($hospitals as $key => $hospital)
                                            <option
                                                value="{{ $hospital->id }}" {{ $indicator->hospital_id == $hospital->id ? 'selected' : '' }}>
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
                                    <select class="form-control" name="hospitalization_result_id">
                                        <option></option>
                                        @foreach ($hospitalization_results as $key => $hospitalization_result)
                                            <option
                                                value="{{ $hospitalization_result->id }}" {{ $indicator->hospitalization_result_id == $hospitalization_result->id ? 'selected' : '' }}>
                                                {{ $hospitalization_result->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('hospitalization_result_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Кто вызвал</label>
                                    <select class="form-control" name="called_person_id">
                                        <option></option>
                                        @foreach ($called_persons as $key => $called_person)
                                            <option
                                                value="{{ $called_person->id }}" {{ $indicator->called_person_id == $called_person->id ? 'selected' : '' }}>
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
                                    <select class="form-control"  name="call_place_id">
                                        <option></option>
                                        @foreach ($call_places as $key => $call_place)
                                            <option
                                                value="{{ $call_place->id }}" {{ $indicator->call_place_id == $call_place->id ? 'selected' : '' }}>
                                                {{ $call_place->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('call_place_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </td>
                                <td>
                                    <label>Диагноз врача</label>
                                    <select class="form-control" name="diagnosis_id">
                                        <option></option>
                                        @foreach ($diagnoses as $key => $diagnosis)
                                            <option
                                                value="{{ $diagnosis->id }}" {{ $diagnosis->id == $indicator->diagnosis_id ? 'selected' : '' }}>
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
                                    <label for="brigade_call_time">Вр. доезда на выз.</label>

                                    <input type="time" name="travel_time"
                                           value="{{$indicator->brigade_call_time}}" class="form-control" >
                                </td>
                                <td>
                                    <label for="travel_time">Вр.на прин.выз.бр.
                                        vaqti</label>

                                    <input type="time" name="brigade_call_time" class="form-control"
                                           value="{{$indicator->travel_time}}" >
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            @if (auth()->user()->role->id==4 or auth()->user()->role->id==1)
                                <button type="submit" name="confirm_status" value="3" class="btn btn-primary fa-pull-right m-r-5">
                                    Қайта кўриб чиқиш учун қайтинг
                                </button>
                                <button type="submit" name="confirm_status" value="1" class="btn btn-primary fa-pull-right m-r-5">
                                    Тасдиқлаш
                                </button>
                            @else
                                <button type="submit" name="confirm_status" value="" class="btn btn-primary fa-pull-right m-r-5">
                                    Ўзингиз учун сақлаш
                                </button>
                                <button type="submit" name="confirm_status" value="2" class="btn btn-primary fa-pull-right m-r-5">
                                    Тасдиқлаш учун тақдим этиш
                                </button>
                            @endif
                        </div>
                    </form>
    </x-panel>
    <script>


        function myFunction(val) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `district_region/${val}`);
        xhr.send();
        xhr.responseType = "json";
        xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.response);
        var x = document.getElementById("mySelect");
        document.querySelectorAll('#mySelect option').forEach(option => option.remove())
            var option = document.createElement("option");
            for (const  object in xhr.response) {
              var option = document.createElement("option");
              option.text = xhr.response[object]['name'];
              option.value=xhr.response[object]['coato'];
              x.add(option);
             }
        } else {
        console.log(`Error: ${xhr.status}`);
        }
        };
        }


        function my_Function(val) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `district_region/${val}`);
        xhr.send();
        xhr.responseType = "json";
        xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.response);
        var x = document.getElementById("my_id");
        document.querySelectorAll('#my_id option').forEach(option => option.remove())
            var option = document.createElement("option");
            for (const  object in xhr.response) {
              var option = document.createElement("option");
              option.text = xhr.response[object]['name'];
              option.value=xhr.response[object]['coato'];
              x.add(option);
             }
        } else {
        console.log(`Error: ${xhr.status}`);
        }
        };
        }






    </script>

@endsection
