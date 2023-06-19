@extends('dashboard.layouts.default')
@php
    $selectedID = null;
    $order = request()->sort;
@endphp


@section('content')
    <x-panel title="Пользователи в СЭМП">
        <h4 class="panel-title">Пользователи</h4>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Субъект СЭМП</th>
                        <th>ФИО пользователя</th>
                        <th>Номер телефона</th>
                        <th>Электронная почта</th>
                        <th>Роль</th>
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
                                <select class="form-control form-control-sm" name="branch">
                                    <option value="" style="font-size: 12px;">Все</option>
                                    @foreach ($branches as $id => $name)
                                        <option value="{{ $id }}" style="font-size: 12px;"
                                            @if ($id == request('branch')) selected @endif>{{ $name }}</option>
                                    @endforeach
                                </select>
                                </select>
                            </td>
                            <td>
                                <input class="form-control form-control-sm" type="text" name="name"
                                    value="{{ request('name') }}">
                            </td>
                            <td>
                                <input class="form-control form-control-sm" type="text" name="phone_number"
                                    value="{{ request('phone_number') }}">
                            </td>
                            <td>
                                <input class="form-control form-control-sm" type="text" name="email"
                                    value="{{ request('email') }}">
                            </td>
                            <td>
                                <select class="form-control form-control-sm" name="role">
                                    <option value="" style="font-size: 12px;">Все</option>
                                    @foreach ($roles as $id => $name)
                                        <option value="{{ $id }}" style="font-size: 12px;"
                                            @if ($id == request('role')) selected @endif>{{ $name }}</option>
                                    @endforeach
                                </select>
                                </select>
                            </td>
                            <td class="align-middle d-flex justify-content-center">
                                <div>
                                    <button type="submit" class="btn btn-sm btn-primary">Применить</button>
                                </div>
                            </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->branch->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->email }}</td>
                            <td> {{ $item->role->name }} </td>
                            <td class="align-middle">
                                <div class="d-flex">
                                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-xs mr-1">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs mr-1"
                                        onclick="{{ $selectedID = $item->id }}; confirmDelete({{ $item->id }})">
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


    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>

<!-- Confirmation Modal -->
@includeWhen($selectedID, 'components.modals.confirmation-modal', ['id' => $selectedID, 'routeName' => 'users.destroy'])

<script>
    function confirmDelete(id) {
        $('#deleteConfirmationModal').modal('show');
        // $('#deleteForm').attr('action', '/acs/delete/' + id);
    }

    $().ready(function() {
        // Add this code to handle the form submission success
        // $('#deleteForm').on('submit', function() {
        //     $('#deleteConfirmationModal').modal('hide');
        //     history.go(-1); // Redirect back to the previous page
        //     return true; // Allow the form to submit
        // });
    });
</script>
@endsection