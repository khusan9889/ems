@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')
    <x-panel >
        <div class="d-flex justify-content-between mb-3 ">
            <h2>Тез ёрдам ҳудудлари.<br>Область скорой помощи.</h2>
            <a href="{{ route('region.create-page') }}" class="btn btn-success">Қўшиш<br>Добавить</a>
        </div>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Вилоят номи</th>
                    <th>СОАТО</th>
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
                            <input class="form-control form-control-sm" type="text" name="name"
                                   value="{{ request('name') }}">
                        </td>
                        <td>
                            <input class="form-control form-control-sm" type="text" name="coato"
                                   value="{{ request('coato') }}">
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
                        <td>{{ ($data->currentpage()-1)*10 + $loop->index + 1}}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->coato }}</td>
                        <td class="d-flex align-items-center justify-content-center">
                            <div class="d-flex justify-content-center">
                                    <a href="{{ route('region.edit', $item->id) }}"
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
        <div class="float-right">{{$data->withQueryString()->links()}}</div>
    </div>


    @include('components.modals.confirmation-modal')

    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');
            $('#deleteForm').attr('action', `/region/delete/${id}`);
        }
    </script>
@endsection
