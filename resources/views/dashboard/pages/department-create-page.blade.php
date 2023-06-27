@extends('dashboard.layouts.default')
@section('content')
    <h1 class="page-header">Отделения - создание нового отделения</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Форма создания нового отделения</h5>
                        <a href="{{ route('departments.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('department.store') }}">
                        @csrf
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
                                <tr>
                                    <th>Название отделения</th>
                                    <td>
                                        <input type="text" name="name" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Субъект</th>
                                    <td>
                                        <select class="form-control" name="branch_id" required>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">
                                                    {{ $branch->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
