{{-- @extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">Отделения - таблица для изменений</h1>
    <x-panel>
        <form method="POST" action="{{ route('department.update', $department->id) }}">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Название отделения</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $department->name }}" required>
            </div>

            <div class="form-group">
                <label for="branch">Субъект</label>
                <select class="form-control" name="branch_id" id="branch" required>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}" {{ $branch->id == $department->branch_id ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Department</button>
            </div>
        </form>
    </x-panel>
@endsection --}}


@extends('dashboard.layouts.default')
@section('content')
    <h1 class="page-header">Отделения - таблица для изменений</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Форма {{ $department->id }}</h5>
                        <a href="{{ url('/departments') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('department.update', ['department' => $department->id]) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
                                <tr>
                                    <th>id</th>
                                    <td>{{ $department->id }}</td>
                                </tr>
                                <tr>
                                    <th>Название отделения</th>
                                    <td>
                                        <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Субъект</th>
                                    <td>
                                        <select class="form-control" name="branch_id" required>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}" {{ $branch->id == $department->branch_id ? 'selected' : '' }}>
                                                    {{ $branch->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
