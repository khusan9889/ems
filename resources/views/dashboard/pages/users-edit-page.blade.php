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
                <select class="form-control" id="branch" name="branch_id">
                    <option value="" hidden>Выберите субъект</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}" {{ $branch->id == $data->branch_id ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="department_id">Отделение</label>
                <select class="form-control" id="department" name="department_id">
                    <option value="" hidden>Выберите отделение</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @selected(old('department_id') == $department->id)>
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

            <div class="form-group">
                <label for="password">Изменить пароль</label>
                <input type="text" class="form-control" id="password" name="password" >
            </div>

            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </x-panel>
@endsection

@push('custom_js')
<script>
    var axios=require('axios');
    let departments = [];
        const branch = document.getElementById('branch')
        const fetchDepartmentsByBranchId = async function(value) {
            try {
                // const target = event.target

                const res = await axios({
                    url: '/departments/branch',
                    params: {
                        branch_id: Number(value)
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

        }
        branch.addEventListener('change', (event) => fetchDepartmentsByBranchId(event.target.value))
        window.addEventListener('DOMContentLoaded', function(event) {
            const selectedBranch = document.getElementById('branch')
            console.log('selectedBranch id: ', selectedBranch.value);
            fetchDepartmentsByBranchId(selectedBranch.value)
        })
</script>

@endpush
