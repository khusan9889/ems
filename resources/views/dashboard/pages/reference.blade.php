@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')
    <h1 class="page-header">Справочник скорой помощи</h1>
    <x-panel>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('reference.create-page') }}" class="btn btn-success">Добавить</a>
        </div>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Тип</th>
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
                            <select class="form-control form-control-sm" name="table_name">
                                <option value="" style="font-size: 12px;">Все</option>
                                <option value="call_types" style="font-size: 12px;"
                                        @if ("call_types" == request('table_name')) selected @endif>Тип вызова
                                </option>
                                <option value="reasons" style="font-size: 12px;"
                                        @if ("reasons" == request('table_name')) selected @endif>Причина вызова
                                </option>
                                <option value="call_results" style="font-size: 12px;"
                                        @if ("call_results" == request('table_name')) selected @endif>Результат
                                    выезда
                                </option>
                                <option value="hospitalization_results" style="font-size: 12px;"
                                        @if ("hospitalization_results" == request('table_name')) selected @endif>
                                    Результат госпитализации
                                </option>
                                <option value="called_persons" style="font-size: 12px;"
                                        @if ("called_persons" == request('table_name')) selected @endif>Кто вызвал
                                </option>
                                <option value="Место вызова" style="font-size: 12px;"
                                        @if ("call_places" == request('table_name')) selected @endif>Место вызова
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
                @foreach ($references as $key => $item)
                    <tr>
                        <td>{{ ($references->currentpage()-1)*10 + $loop->index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ __("messages.".$item->table_name) }}</td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('reference.edit', $item->id) }}"
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
        <div class="float-right">{{$references->withQueryString()->links()}}</div>

    </div>


    @include('components.modals.confirmation-modal')

    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');
            $('#deleteForm').attr('action', `/reference/delete/${id}`);
        }

    </script>
@endsection
