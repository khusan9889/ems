@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">Отделения - таблица для изменений</h1>
    <x-panel>
        <form method="POST" action="{{ route('department.update', $department->id) }}">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Department Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $department->name }}" required>
            </div>

            <div class="form-group">
                <label for="branch">Branch</label>
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
@endsection
