@extends('dashboard.layouts.default')

@section('content')
    <x-panel title="Изменить пользователя">
        <form method="POST" action="{{ route('users.update', $data->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">ФИО Пользователя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
            </div>

            <div class="form-group">
                <label for="branch_id">Субъект</label>
                <select class="form-control" id="branch" name="branch_id" @disabled(auth()->user()->branch_id !== 1 && auth()->user()->branch_id !== null)>
                    <option value="" hidden>Выберите субъект</option>
                    @foreach ($branches as $key => $branch)
                        <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}
                            @selected(auth()->user()->branch_id == $branch->id)>
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="department_id">Отделение</label>
                <select class="form-control" id="department_id" name="department_id" required>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $data->department_id ? 'selected' : '' }} >
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="role_id">Роль</label>
                <select class="form-control" id="role_id" name="role_id" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id == $data->role_id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Номер телефона</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $data->phone_number }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </x-panel>
@endsection
