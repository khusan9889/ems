@extends('dashboard.layouts.default')
@php
    $selectedID = null;
    $order = request()->sort;
@endphp


@section('content')
    <h1 class="page-header">Пользователи</h1>
    <x-panel>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('users.create-page') }}" class="btn btn-success">Добавить</a>
        </div>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Субъект СЭМП</th>
                    <th>Отделение</th>
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
                        </td>
                        <td>
                            <select class="form-control form-control-sm" name="department">
                                <option value="" style="font-size: 12px;">Все</option>
                                @foreach ($departments as $id => $name)
                                    @if ($id == request('department'))
                                        <option value="{{ $id }}" style="font-size: 12px;"
                                                @if ($id == request('department')) selected @endif>{{ $name }}</option>
                                    @endif
                                @endforeach
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
                        <td>{{ $item->branch?->name }}</td>
                        <td>{{ $item->department?->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->email }}</td>
                        <td> {{ $item->role?->name }} </td>
                        <td class="align-middle">
                            <div class="d-flex">
                                <a href="{{ route('users.edit-page', $item->id) }}" class="btn btn-warning btn-xs mr-1">
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
    @includeWhen($selectedID, 'components.modals.confirmation-modal', ['id' => $selectedID, 'routeName'=> 'users.delete'])

    @push('scripts')
        <script>
            function confirmDelete(id) {
                $('#deleteConfirmationModal').modal('show');
            }

            $().ready(function() {
            });


            let departments = [];
            const branch = document.getElementById('branch')
            branch.addEventListener('change', async function (event) {
                try {
                    const target = event.target

                    const res = await axios({
                        url: '/departments/branch',
                        params: {
                            branch_id: Number(target.value)
                        }
                    })

                    departments = res.data

                    const department = document.getElementById('department')

                    department.innerHTML = '<option value="" hidden>Выберите отделение</option>'
                    departments.forEach(dep => {
                        const optEl = document.createElement('option')
                        optEl.value = dep.id
                        optEl.innerHTML = dep.name
                        department.insertAdjacentElement('beforeend', optEl)
                    })
                } catch (error) {
                    alert(error.message)
                }

            })
        </script>
    @endpush
@endsection
