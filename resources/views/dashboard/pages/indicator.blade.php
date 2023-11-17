@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')
    <h1 class="page-header">Медицинские данные</h1>
    <x-panel>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('indicator.create-page') }}" class="btn btn-success">Добавить</a>
        </div>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Область COATO</th>
                    <th>Район COATO</th>
                    <th>Подстанция принятия вызова</th>
                    <th>Заполнение карты вызова</th>
                    <th>Тип вызова</th>
                    <th>Номер КВ</th>
                    <th>Дата приема вызова</th>
                    <th>Время приема вызова</th>
                    <th>время началы формирования Карточки транспортировки (КТ)</th>
                    <th>Время завершения формирования КТ</th>
                    <th>Время передачи вызова Бригаде</th>
                    <th>Время выезда Бригады</th>
                    <th>Прибытие Бригады на место вызова</th>
                    <th>Время началы транспортировки</th>
                    <th>Время прибытия на мед. Учреждение</th>
                    <th>время завершения вызова</th>
                    <th>Время возврашения на подстанцию</th>
                    <th>Название бригады</th>
                    <th>Подробный адрес вызова</th>
                    <th>Причина вызова</th>
                    <th>Пол пациента</th>
                    <th>Возраст пациента</th>
                    <th>Область проживания пациента</th>
                    <th>Район проживания пациента</th>
                    <th>Диагноз по МКБ10</th>
                    <th>Результат выезда</th>
                    <th>Место госпитализации</th>
                    <th>Результат госпитализации</th>
                    <th>Кто вызвал</th>
                    <th>Место вызова</th>
                    <th>Действия</th>
                </tr>
                <tr>
                    <form action="">
                        <td class="align-middle">
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-link btn-sm sort-btn" data-sort-by="id"
                                        onclick="{{ $order = $order === 'ASC' ? 'DESC' : 'ASC' }}">
                                    <i class="fas fa-sort fa-lg"></i>
                                </button>
                                <input type="hidden" name="sort" value="{{ $order }}">
                            </div>
                        </td>
                        <td>
                            <input class="form-control form-control-sm" type="text" name="name"
                                   value="{{ request('name') }}">
                        </td>
                        <td>
                            <input class="form-control form-control-sm" type="text" name="item_id"
                                   value="{{ request('item_id') }}">
                        </td>
                        <td>
                            <select class="form-control form-control-sm" name="table_name">
                                <option value="" style="font-size: 12px;">Все</option>
                                <option value="Тип вызова" style="font-size: 12px;"
                                        @if ("Тип вызова" == request('table_name')) selected @endif>Тип вызова
                                </option>
                                <option value="Причина вызова" style="font-size: 12px;"
                                        @if ("Причина вызова" == request('table_name')) selected @endif>Причина вызова
                                </option>
                                <option value="Результат выезда" style="font-size: 12px;"
                                        @if ("Результат выезда" == request('table_name')) selected @endif>Результат
                                    выезда
                                </option>
                                <option value="Результат госпитализации" style="font-size: 12px;"
                                        @if ("Результат госпитализации" == request('table_name')) selected @endif>
                                    Результат госпитализации
                                </option>
                                <option value="Кто вызвал" style="font-size: 12px;"
                                        @if ("Кто вызвал" == request('table_name')) selected @endif>Кто вызвал
                                </option>
                                <option value="Место вызова" style="font-size: 12px;"
                                        @if ("Место вызова" == request('table_name')) selected @endif>Место вызова
                                </option>
                            </select>
                        </td>
                        <td class="align-middle d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary">Применить</button>
                            </div>
                        </td>
                    </form>
                </tr>
                </thead>
                <tbody>
                @foreach ($indicators as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->call_region_coato }}</td>
                        <td>{{ $item->call_district_coato }}</td>
                        <td>{{ $item->substation_id }}</td>
                        <td>{{ $item->filling_call_card }}</td>
                        <td>{{ $item->call_type->name }}</td>
                        <td>{{ $item->card_number }}</td>
                        <td>{{ $item->call_received }}</td>
                        <td>{{ $item->call_reception }}</td>
                        <td>{{ $item->beginning_formation_ct }}</td>
                        <td>{{ $item->completion_formation_ct }}</td>
                        <td>{{ $item->transfer_brigade }}</td>
                        <td>{{ $item->brigade_departure }}</td>
                        <td>{{ $item->arrival_brigade_place }}</td>
                        <td>{{ $item->transportation_start }}</td>
                        <td>{{ $item->arrival_medical_center }}</td>
                        <td>{{ $item->call_end }}</td>
                        <td>{{ $item->return_substation }}</td>
                        <td>{{ $item->brigade->name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->reason->name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->age }}</td>
                        <td>{{ $item->residence_region_coato }}</td>
                        <td>{{ $item->residence_district_coato }}</td>
                        <td>{{ $item->diagnos }}</td>
                        <td>{{ $item->call_result->name }}</td>
                        <td>{{ $item->hospital->name }}</td>
                        <td>{{ $item->hospitalization_result->name }}</td>
                        <td>{{ $item->called_person->name }}</td>
                        <td>{{ $item->call_place->name }}</td>
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
