@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')
    <h1 class="page-header">Подстанция скорой помощи</h1>
    <x-panel>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('substation.create-page') }}" class="btn btn-success">Добавить</a>
        </div>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название подстанция</th>
                    <th>Область СОАТО</th>
                    <th>Район СОАТО</th>
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
                            <input class="form-control form-control-sm" type="text" name="region_coato"
                                   value="{{ request('region_coato') }}">
                        </td>
                        <td>
                            <input class="form-control form-control-sm" type="text" name="district_coato"
                                   value="{{ request('region_coato') }}">
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
                @foreach ($substations as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->region_coato }}</td>
                        <td>{{ $item->district_coato }}</td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('substation.edit', $item->id) }}"
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
        {{ $substations->links() }}
    </div>


    @include('components.modals.confirmation-modal')

    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');
            $('#deleteForm').attr('action', `/substation/delete/${id}`);
        }
    </script>
@endsection
