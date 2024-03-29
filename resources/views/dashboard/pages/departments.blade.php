@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')
    <h1 class="page-header">Бўлимлар</h1>
    <x-panel>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('department.create-page') }}" class="btn btn-success">Добавить</a>
        </div>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Филиал</th>
                        <th>Бўлим</th>
                        <th class="d-flex align-items-center justify-content-center">Действия</th>
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
                                <select class="form-control form-control-sm" name="branch" @if (auth()->user()->branch_id != 1) disabled @endif>
                                    <option value="" style="font-size: 12px;">Все</option>
                                    @foreach ($branches as $id => $name)
                                        <option value="{{ $id }}" style="font-size: 12px;"
                                                @if ($id == request('branch') || (auth()->user()->branch_id == $id && auth()->user()->branch_id != 1)) selected @endif>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input class="form-control form-control-sm" type="text" name="name" value="{{ request('name') }}">
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
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ ($data->currentpage()-1)*10 + $loop->index + 1 }}</td>
                            <td>{{ $item->branch->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <div class="d-flex">
                                    @if ($userBranchID == 0 || $userBranchID == 1 || $userBranchID == $item->branch->id)
                                        <a href="{{ route('departments.edit', $item->id) }}"
                                            class="btn btn-warning btn-xs mr-1">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-xs mr-1"
                                            onclick="confirmDelete({{ $item->id }})"
                                            {{ $userBranchID != $item->branch->id && $userBranchID != 1 ? 'disabled' : '' }}>
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-panel>

    <div class="d-flex justify-content-center">
        <div class="float-right">{{$data->withQueryString()->links()}}</div>
    </div>


    @include('components.modals.confirmation-modal')

    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');
            $('#deleteForm').attr('action', `/departments/delete/${id}`);
        }
    </script>
@endsection
