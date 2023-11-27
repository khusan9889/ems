@php use Carbon\Carbon; @endphp
@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')
    <h1 class="page-header">Скорая помощь</h1>



    <x-panel>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger fade show in m-b-15">
                    <strong>Ошибка!</strong>
                    {{__($error)}}
                    <span class="close" data-dismiss="alert">&times;</span>
                </div>
            @endforeach
        @endif


        <div class="d-flex justify-content-end mb-3">
            <a href="#modal-dialog" class="btn btn-success mr-2" data-toggle="modal">Импорт Excel</a>
            <a href="{{ route('indicator.create-page') }}" class="btn btn-success">Добавить</a>
        </div>
        <!-- #modal-dialog -->
        <div class="modal fade" id="modal-dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title">Импорт Excel</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form method="POST" action="{{ route('indicator.import') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            <pre>
                                @error(' ')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </pre>

                            @csrf
                            <td>
                                <span class="btn btn-success fileinput-button form-control">
                                    <i class="fa fa-plus"></i>
                                    <span>Выберите файл...</span>
                                    <input  type="file" name="import_file"  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                                </span>
                            </td>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-sm btn-primary">Импорт</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="d-flex">


            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <tr>
                    <form action="">
                        <td class="text-nowrap">
                            <label>Область вызова </label>
                            <select class="form-control" name="call_region_coato">
                                <option value="">Все</option>
                                @foreach ($regions as $key => $region)
                                    <option
                                        value="{{ $region->coato }}" {{ request('call_region_coato') == $region->coato ? 'selected' : '' }}>
                                        {{ $region->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('call_region_coato')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="text-nowrap">
                            <label>Район вызова</label>
                            <select class="form-control" name="call_district_coato">
                                <option value="">Все</option>
                                @foreach ($districts as $key => $district)
                                    <option
                                        value="{{ $district->coato }}" {{ request('call_district_coato') == $district->coato ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('call_district_coato')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="text-nowrap">
                            <label>Подстанция принятия вызова</label>
                            <select class="form-control" name="substation_id">
                                <option value="">Все</option>
                                @foreach ($substations as $key => $substation)
                                    <option
                                        value="{{ $substation->id }}" {{ request('substation_id') == $substation->id ? 'selected' : '' }}>
                                        {{ $substation->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('substation_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="text-nowrap">
                            <label>Бригады</label>
                            <select class="form-control" name="brigade_id">
                                <option value="">Все</option>
                                @foreach ($brigades as $key => $brigade)
                                    <option
                                        value="{{ $brigade->id }}" {{ request('brigade_id') == $brigade->id ? 'selected' : '' }}>
                                        {{ $brigade->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brigade_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="text-nowrap">
                            <label>Результат выезда</label>
                            <select class="form-control" name="call_result_id">
                                <option value="">Все</option>
                                @foreach ($call_results as $key => $call_result)
                                    <option
                                        value="{{ $call_result->id }}" {{ request('call_result_id') == $call_result->id ? 'selected' : '' }}>
                                        {{ $call_result->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('call_result_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="text-nowrap">
                            <label>Дата приема вызова</label>
                            <input class="form-control" type="date" name="call_received"
                                   value="{{request('call_received')}}">
                        </td>
                        {{--                        <td class="text-nowrap">--}}
                        {{--                            <label>Место госпитализации</label>--}}
                        {{--                            <select class="form-control"  name="hospital_id" readonly>--}}
                        {{--                                @foreach ($hospitals as $key => $hospital)--}}
                        {{--                                    <option value="{{ $hospital->id }}" {{ old('hospital_id') == $hospital->id ? 'selected' : '' }}>--}}
                        {{--                                        {{ $hospital->name }}--}}
                        {{--                                    </option>--}}
                        {{--                                @endforeach--}}
                        {{--                            </select>--}}
                        {{--                            @error('hospital_id')--}}
                        {{--                            <span class="text-danger">{{ $message }}</span>--}}
                        {{--                            @enderror--}}
                        {{--                        </td>--}}
                        {{--                        <td class="text-nowrap">--}}
                        {{--                            <label>Результат госпитализации</label>--}}
                        {{--                            <select class="form-control"  name="hospitalization_result_id" readonly>--}}
                        {{--                                @foreach ($hospitalization_results as $key => $hospitalization_result)--}}
                        {{--                                    <option value="{{ $hospitalization_result->id }}" {{ old('hospitalization_result_id') == $hospitalization_result->id ? 'selected' : '' }}>--}}
                        {{--                                        {{ $hospitalization_result->name }}--}}
                        {{--                                    </option>--}}
                        {{--                                @endforeach--}}
                        {{--                            </select>--}}
                        {{--                            @error('hospitalization_result_id')--}}
                        {{--                            <span class="text-danger">{{ $message }}</span>--}}
                        {{--                            @enderror--}}
                        {{--                        </td>--}}
                        {{--                        <td class="text-nowrap">--}}
                        {{--                            <label>Кто вызвал</label>--}}
                        {{--                            <select class="form-control"  name="called_person_id" readonly>--}}
                        {{--                                @foreach ($called_persons as $key => $called_person)--}}
                        {{--                                    <option value="{{ $called_person->id }}" {{ old('called_person_id') == $called_person->id ? 'selected' : '' }}>--}}
                        {{--                                        {{ $called_person->name }}--}}
                        {{--                                    </option>--}}
                        {{--                                @endforeach--}}
                        {{--                            </select>--}}
                        {{--                            @error('called_person_id')--}}
                        {{--                            <span class="text-danger">{{ $message }}</span>--}}
                        {{--                            @enderror--}}
                        {{--                        </td>--}}
                        {{--                        <td class="text-nowrap">--}}
                        {{--                            <label>Место вызова</label>--}}
                        {{--                            <select class="form-control"  name="call_place_id" readonly>--}}
                        {{--                                @foreach ($call_places as $key => $call_place)--}}
                        {{--                                    <option value="{{ $call_place->id }}" {{ old('call_place_id') == $call_place->id ? 'selected' : '' }}>--}}
                        {{--                                        {{ $call_place->name }}--}}
                        {{--                                    </option>--}}
                        {{--                                @endforeach--}}
                        {{--                            </select>--}}
                        {{--                            @error('call_place_id')--}}
                        {{--                            <span class="text-danger">{{ $message }}</span>--}}
                        {{--                            @enderror--}}
                        {{--                        </td>--}}
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-sm btn-primary mb-2">Применить</button>
                            </div>
                        </td>
                    </form>
                </tr>

            </table>
        </div>

        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th class="text-nowrap">№</th>
                    <th class="text-nowrap">Область вызова</th>
                    <th class="text-nowrap">Район вызова</th>
                    <th class="text-nowrap">Подстанция принятия вызова</th>
                    <th class="text-nowrap">Заполнение карты вызова</th>
                    <th class="text-nowrap">Тип вызова</th>
                    <th class="text-nowrap">Номер КВ</th>
                    <th class="text-nowrap">Дата приема вызова</th>
                    <th class="text-nowrap">Время приема вызова</th>
                    <th class="text-nowrap">время началы формирования КТ</th>
                    <th class="text-nowrap">Время завершения формирования КТ</th>
                    <th class="text-nowrap">Время передачи вызова Бригаде</th>
                    <th class="text-nowrap">Время выезда Бригады</th>
                    <th class="text-nowrap">Прибытие Бригады на место вызова</th>
                    <th class="text-nowrap">Время началы транспортировки</th>
                    <th class="text-nowrap">Время прибытия на мед. Учреждение</th>
                    <th class="text-nowrap">время завершения вызова</th>
                    <th class="text-nowrap">Время возврашения на подстанцию</th>
                    <th class="text-nowrap">Название бригады</th>
                    <th class="text-nowrap">Подробный адрес вызова</th>
                    <th class="text-nowrap">Причина вызова</th>
                    <th class="text-nowrap">Пол пациента</th>
                    <th class="text-nowrap">Возраст пациента</th>
                    <th class="text-nowrap">Область проживания пациента</th>
                    <th class="text-nowrap">Район проживания пациента</th>
                    <th class="text-nowrap">Диагноз по МКБ10</th>
                    <th class="text-nowrap">Результат выезда</th>
                    <th class="text-nowrap">Место госпитализации</th>
                    <th class="text-nowrap">Результат госпитализации</th>
                    <th class="text-nowrap">Кто вызвал</th>
                    <th class="text-nowrap">Место вызова</th>
                    <th class="text-nowrap">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($indicators as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item?->call_region?->name }}</td>
                        <td>{{ $item?->call_district?->name }}</td>
                        <td>{{ $item?->substation?->name }}</td>
                        <td>@if($item->filling_call_card)
                                Истинный
                            @else
                                Ложный
                            @endif</td>
                        <td>{{ $item->call_type?->name }}</td>
                        <td>{{ $item->card_number }}</td>
                        <td>{{ Carbon::parse($item->call_received)->isoFormat('YYYY-MM-DD') }}</td>
                        <td>{{ $item->call_reception}}</td>
                        <td>{{ $item->beginning_formation_ct}}</td>
                        <td>{{ $item->completion_formation_ct}}</td>
                        <td>{{ $item->transfer_brigade}}</td>
                        <td>{{ $item->brigade_departure}}</td>
                        <td>{{ $item->arrival_brigade_place}}</td>
                        <td>{{ $item->transportation_start}}</td>
                        <td>{{ $item->arrival_medical_center}}</td>
                        <td>{{ $item->call_end}}</td>
                        <td>{{ $item->return_substation}}</td>
                        <td>{{ $item?->brigade?->name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item?->reason?->name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->age }}</td>
                        <td>{{ $item?->residence_region?->name }}</td>
                        <td>{{ $item?->residence_district?->name }}</td>
                        <td>{{ $item->diagnos }}</td>
                        <td>{{ $item?->call_result?->name }}</td>
                        <td>{{ $item?->hospital?->name }}</td>
                        <td>{{ $item?->hospitalization_result?->name }}</td>
                        <td>{{ $item?->called_person?->name }}</td>
                        <td>{{ $item?->call_place?->name }}</td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('indicator.edit', $item->id) }}"
                                   class="btn btn-warning btn-xs mr-1">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-xs mr-1"
                                        onclick="confirmDelete({{ $item->id }})">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-panel>

    <div class="d-flex justify-content-center">
        {{ $indicators->links() }}
    </div>


    @include('components.modals.confirmation-modal')

    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');
            $('#deleteForm').attr('action', `/indicator/delete/${id}`);
        }




    </script>
@endsection
