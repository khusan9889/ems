@extends('dashboard.layouts.default')
@section('content')

    <h1 class="page-header">Суб филиал - таблица для изменений</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Форма</h5>
                    </div>
                    <form method="POST" action="{{ route('sub.update', ['id' => $department->id]) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
                                <tr>
                                    <th>Филиал</th>
                                    <td>
                                        <select class="form-control" id="branch" name="branch_id">
                                            <option value="" hidden>Выберите субъект</option>
                                            @foreach ($branches as $key => $branch)
                                                <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}
                                                    @selected(auth()->user()->branch_id == $branch->id)>
                                                    {{ $branch->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Название суб филиал</th>
                                    <td>
                                        <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
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
