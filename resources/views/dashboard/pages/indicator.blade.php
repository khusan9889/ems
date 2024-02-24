@php use Carbon\Carbon; @endphp
@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')

    <x-panel title="Тез ёрдам. Скорая помощь.">
        <div class="d-flex justify-content-between mb-3">
            <h3>Тез ёрдам. Скорая помощь.</h3>
            <a href="{{ route('indicator.create-page') }}" class="btn btn-success">Добавить</a>
        </div>
        <div class="d-flex">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <tr>
                    <form action="">
                        <td class="text-nowrap">
                            <label>Области</label>
                            <select class="form-control" name="call_region_coato" onchange="myFunction(this.value)">
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
                            <label>Подстанция</label>
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
                            <label>Статус одобрения</label>
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
                            <label>Дата</label>
                            <input class="form-control" type="date" name="call_received"
                                   value="{{request('call_received')}}">
                        </td>
                        <td class="text-nowrap">
                            <label>Подтвердите статус</label>
                            <div class="d-flex justify-content-center">
                                <select class="form-control" name="confirm_status">
                                    <option value="">Все</option>
                                    <option value="1" {{ request('confirm_status') == 1? 'selected' : '' }}>Одобрение
                                    </option>
                                    <option value="2" {{ request('confirm_status') == 2? 'selected' : '' }}>Подача на
                                        одобрение
                                    </option>
                                    <option value="3" {{ request('confirm_status') == 3? 'selected' : '' }}>Возврат на
                                        доработку
                                    </option>
                                </select>
                                @error('confirm_status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="btn btn-sm btn-primary ml-2">Применить</button>
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
                    <th class="text-nowrap">Область</th>
                    <th class="text-nowrap">Подстанция принятия вызова</th>
                    <th class="text-nowrap">Заполнение карты вызова</th>
                    <th class="text-nowrap">Тип вызова</th>
                    <th class="text-nowrap">Номер КВ</th>
                    <th class="text-nowrap">Дата приёма</th>
                    <th class="text-nowrap">Вр. нач. форм. КТ</th>
                    <th class="text-nowrap">Время приёма</th>
                    {{--                    <th class="text-nowrap">Время завершения формирования КТ</th>--}}
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
                    {{--                    <th class="text-nowrap">Область проживания пациента</th>--}}
                    {{--                    <th class="text-nowrap">Район проживания пациента</th>--}}
                    <th class="text-nowrap">Код МКБ</th>
                    <th class="text-nowrap">Результат выезда</th>
                    <th class="text-nowrap">Место госпитализации</th>
                    <th class="text-nowrap">Результат госпитализации</th>
                    <th class="text-nowrap">Кто вызвал</th>
                    <th class="text-nowrap">Место вызова</th>
                    <th class="text-nowrap">Вр.на прин.выз.бр.</th>
                    <th class="text-nowrap">Вр. доезда на выз.</th>
                    <th class="text-nowrap">Диагноз</th>
                    <th class="text-nowrap">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($indicators as $key => $item)
                    <tr
                        @if ($item->confirm_status == 3)
                            class="table-danger"
                        @endif

                        @if ($item->confirm_status == 2)
                            class="table-warning"
                        @endif

                        @if ($item->confirm_status == 1)
                            class="table-success"
                        @endif
                    >
                        <td>{{ ($indicators->currentpage()-1)*10 + $loop->index + 1}} {{$item->confirm_status}}</td>
                        <td>{{ $item?->call_region?->name }}</td>
{{--                        <td>{{ $item?->call_district?->name }}</td>--}}
                        <td>{{ $item?->substation?->name }}</td>
                        <td>@if($item->filling_call_card)
                                Да
                            @else
                                Нет
                            @endif</td>
                        <td>{{ $item->call_type?->name }}</td>
                        <td>{{ $item->card_number }}</td>
                        <td>{{ Carbon::parse($item->call_received)->isoFormat('YYYY-MM-DD') }}</td>
                        <td>{{ $item->beginning_formation_ct}}</td>
                        <td>{{ $item->call_reception}}</td>
                        {{--                        <td>{{ $item->completion_formation_ct}}</td>--}}
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
                        {{--                        <td>{{ $item?->residence_region?->name }}</td>--}}
                        {{--                        <td>{{ $item?->residence_district?->name }}</td>--}}
                        <td>{{ $item->diagnos }}</td>
                        <td>{{ $item?->call_result?->name }}</td>
                        <td>{{ $item?->hospital?->name }}</td>
                        <td>{{ $item?->hospitalization_result?->name }}</td>
                        <td>{{ $item?->called_person?->name }}</td>
                        <td>{{ $item?->call_place?->name }}</td>
                        <td>{{ $item->brigade_call_time }}</td>
                        <td>{{ $item->travel_time }}</td>
                        <td>{{ $item->diagnosis->name }}</td>
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
        <div class="float-right">{{$indicators->withQueryString()->links()}}</div>
    </div>


    @include('components.modals.confirmation-modal')

    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');
            $('#deleteForm').attr('action', `/indicator/delete/${id}`);
        }

    </script>
@endsection
