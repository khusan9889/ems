@php use Carbon\Carbon; @endphp
@extends('dashboard.layouts.default')
@section('content')

    <h1 class="page-header">Редактировать/Tahrirlash</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ url('/indicator') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('indicator.update', ['id' => $indicator->id]) }}">
                        @csrf
                        @method('PUT')
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
                                    <label>Подстанция принятия вызова/Chaqiruvlarni qabul qilish podstansiyasi</label>
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
                                    <label>Заполнение карты вызова/Chaqiruv kartasini to'ldirish</label>
                                    <select class="form-control" required name="filling_call_card">
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
                                    <label>Тип вызова/Chaqiruv turi</label>
                                    <select class="form-control" required name="call_type_id">
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
                                    <label>Номер КВ/KV raqami</label>
                                    <input type="text" name="card_number" class="form-control" required
                                           value="{{$indicator->card_number}}">
                                </td>
                                <td>
                                    <label>Дата приёма/Chaqiruvni qabul qilish sanasi</label>
                                    <input type="date"
                                           value="{{ Carbon::parse($indicator->call_received)->isoFormat('YYYY-MM-DD')}}"
                                           name="call_received" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Время приёма/Chaqiruvlarni qabul qilish vaqti</label>
                                    <input type="datetime-local"
                                           value="{{ $indicator->call_reception }}"
                                           name="call_reception" class="form-control" required>
                                </td>
                                <td>
                                    <label>Вр. нач. форм. КТ/KT shakllanishining boshlanish vaqti</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->beginning_formation_ct}}"
                                           name="beginning_formation_ct" class="form-control" required>
                                </td>
                                <td>
                                    <label>Время передачи вызова бригаде/Chaqiruvni brigadaga o'tkazish vaqti</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->transfer_brigade}}"
                                           name="transfer_brigade" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Время выезда бригады.Brigadaning ketish vaqti</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->brigade_departure}}"
                                           name="brigade_departure" class="form-control" required>
                                </td>
                                <td>
                                    <label>Прибытие Бригады на место вызова/Brigadaning chaqiruv joyiga kelishi</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->arrival_brigade_place}}"
                                           name="arrival_brigade_place" class="form-control" required>
                                </td>
                                <td>
                                    <label>Время началы транспортировки/Transportning boshlanish vaqti </label>
                                    <input type="datetime-local"
                                           value="{{$indicator->transportation_start}}"
                                           name="transportation_start" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Время прибытия на мед. Учреждение/Tibbiyot markaziga kelish vaqti Tashkil
                                        etish</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->arrival_medical_center}}"
                                           name="arrival_medical_center" class="form-control" required>
                                </td>
                                <td>
                                    <label>время завершения вызова/qo'ng'iroqni tugatish vaqti</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->call_end}}"
                                           name="call_end" class="form-control" required>
                                </td>
                                <td>
                                    <label>Время возвращения на подстанцию/Podstansiyaga qaytish vaqti</label>
                                    <input type="datetime-local"
                                           value="{{$indicator->return_substation}}"
                                           name="return_substation" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Бригада/Brigada</label>
                                    <select class="form-control" required name="brigade_id">
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
                                    <label>Подробный адрес вызова/Batafsil qo'ng'iroq manzili</label>
                                    <input type="text" name="address" class="form-control"
                                           value="{{$indicator->address}}">
                                </td>
                                <td>
                                    <label>Причина вызова/Chaqiruv qilish sababi</label>
                                    <select class="form-control" required name="reason_id">
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
                                    <label>Пол пациента/Bemor jinsi</label>
                                    <select class="form-control" required name="gender">
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
                                    <label>Возраст пациента/Bemorning yoshi</label>
                                    <input type="number" name="age" class="form-control" required
                                           value="{{$indicator->age}}"
                                           min="0">
                                </td>
                                <td>
                                    <label>Диагноз по МКБ10/ICD 10 ga muvofiq diagnostika</label>
                                    <input type="text" name="diagnos" class="form-control" required
                                           value="{{$indicator->diagnos}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Результат выезда/Ketish natijasi</label>
                                    <select class="form-control" required name="call_result_id">
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
                                    <label>Место госпитализации/Kasalxonaga yotqizilgan joy</label>
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
                                    <label>Результат госпитализации/Kasalxonaga yotqizish natijasi</label>
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
                                    <label>Кто вызвал/Kim chaqirdi</label>
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
                                    <label>Место вызова/Chaqiruv joyi</label>
                                    <select class="form-control" required name="call_place_id">
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
                                    <label for="brigade_call_time">Вр. доезда на выз./Yo'lga ketgan vaqt</label>

                                    <input type="time" name="travel_time"
                                           value="{{$indicator->brigade_call_time}}" class="form-control" required>
                                </td>
                                <td>
                                    <label for="travel_time">Вр.на прин.выз.бр./Birgada chaqiruvni qabul qilish
                                        vaqti</label>

                                    <input type="time" name="brigade_call_time" class="form-control"
                                           value="{{$indicator->travel_time}}" required>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            @if (auth()->user()->role->id==4 or auth()->user()->role->id==1)
                                <button type="submit" name="confirm_status" value="3"
                                        class="btn btn-primary fa-pull-right m-r-5">Возврат на доработку
                                </button>
                                <button type="submit" name="confirm_status" value="1"
                                        class="btn btn-primary fa-pull-right m-r-5">Одобрение
                                </button>
                            @else
                                <button type="submit" name="confirm_status" value=""
                                        class="btn btn-primary fa-pull-right m-r-5">Сохранять
                                </button>
                                <button type="submit" name="confirm_status" value="2"
                                        class="btn btn-primary fa-pull-right m-r-5">Подача на одобрение
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
