@extends('dashboard.layouts.default')

@section('content')
    <x-panel title="Создать пользователя">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">ФИО Пользователя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="branch_id">Отделение</label>
                <select class="form-control" id="branch_id" name="branch_id" required>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Roles Dropdown -->
            <div class="form-group">
                <label for="role_id">Роль</label>
                <select class="form-control" id="role_id" name="role_id" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Номер телефона</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </x-panel>
@endsection
