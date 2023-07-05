@extends('dashboard.layouts.default')

@section('content')
    <x-panel title="Создать пользователя">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            
            <div class="form-group">
                <label for="name">ФИО Пользователя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="branch">Выбрать субъект СЭМП</label>
                        <select class="form-control" id="branch"
                                name="branch_id" @disabled(auth()->user()->branch_id !== 1 && auth()->user()->branch_id !== null)>
                            <option value="" hidden>Выберите субъект</option>
                            @foreach ($branches as $key => $branch)
                                <option
                                    value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}
                                    @selected(auth()->user()->branch_id == $branch->id)>
                                    {{ $branch->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('branch_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="department">Выбрать отделение</label>
                        <select class="form-control" id="department" name="department_id">
                            <option value="" hidden>Выберите отделение</option>
                            @foreach ($departments as $department)
                                <option
                                    value="{{ $department->id }}" @selected(old('department_id') == $department->id)>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
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
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">Номер телефона</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                       value="{{ old('phone_number') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </x-panel>
@endsection

@push('scripts')
    <script>
        let departments = [];
        const branch = document.getElementById('branch')
        const fetchDepartmentsByBranchId = async function (value) {
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
        window.addEventListener('DOMContentLoaded', function (event) {
            const selectedBranch = document.getElementById('branch')
            console.log('selectedBranch id: ', selectedBranch.value);
            fetchDepartmentsByBranchId(selectedBranch.value)
        })
    </script>
@endpush
