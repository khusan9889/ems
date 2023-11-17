@extends('dashboard.layouts.default')
@section('content')

    <h1 class="page-header">Обновить область</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ url('/hospital') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('hospital.update', ['id' => $hospital->id]) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
                            <tr>
                                <th>№</th>
                                <td>{{ $hospital->id }}</td>
                            </tr>
                            <tr>
                                <th>Название больницы</th>
                                <td>
                                    <input type="text" name="name" class="form-control" value="{{ $hospital->name }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Область СОАТО</th>
                                <td>
                                    <input type="text" name="region_coato" class="form-control" value="{{ $hospital->region_coato }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Район СОАТО</th>
                                <td>
                                    <input type="text" name="district_coato" class="form-control" value="{{ $hospital->district_coato }}" required>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary ">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
