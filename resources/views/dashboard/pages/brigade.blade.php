@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')
    <h1 class="page-header">Бригада скорой помощи</h1>
    <x-panel>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('brigade.create-page') }}" class="btn btn-success">Добавить</a>
        </div>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название бригады/Brigada nomi</th>
                    <th>Номер бригады/Brigada raqami</th>
                    <th>Название подстанции/Podstansiya nomi</th>
                    <th>Действия/Harakatlar</th>
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
                            <input class="form-control form-control-sm" type="text" name="brigade_number"
                                   value="{{ request('brigade_number') }}">
                        </td>
                        <td>
                            <select class="form-control form-control-sm" name="substation_id">
                                <option value="" style="font-size: 12px;">Все</option>
                                @foreach ($substations as $substation)
                                    <option value="{{ $substation->id }}" style="font-size: 12px;"
                                            @if ($substation->id == request('substation_id')) selected @endif>{{ $substation->name }}</option>
                                @endforeach
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
                @foreach ($brigades as $key => $item)
                    <tr>
                        <td>{{ ($brigades->currentpage()-1)*10 + $loop->index + 1}}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->brigade_number }}</td>
                        <td>{{ $item->substation->name }}</td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                    <a href="{{ route('brigade.edit', $item->id) }}"
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
        <div class="float-right">{{$brigades->withQueryString()->links()}}</div>

    </div>


    @include('components.modals.confirmation-modal')

    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');
            $('#deleteForm').attr('action', `/brigade/delete/${id}`);
        }
    </script>
@endsection
