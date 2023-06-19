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
                <label for="branch_id">Отделение</label>
                <select class="form-control" id="branch_id" name="branch_id" required>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}" {{ $branch->id == $data->branch_id ? 'selected' : '' }}>
                            {{ $branch->name }}
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
