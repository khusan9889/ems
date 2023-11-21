@extends('dashboard.layouts.default')
@section('content')

    <h1 class="page-header">Редактировать район</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ url('/district') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('district.update', ['id' => $district->id]) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
                            <tr>
                                <th>№</th>
                                <td>{{ $district->id }}</td>
                            </tr>
                            <tr>
                                <th>Выберите область</th>
                                <td>
                                    <select class="form-control"  name="region_id">
                                        @foreach ($regions as $key => $region)
                                            <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}
                                            @if ($district->region_id == $region->id) selected @endif>
                                                {{ $region->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('region_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Название района</th>
                                <td>
                                    <input type="text" name="name" class="form-control" value="{{ $district->name }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Район СОАТО</th>
                                <td>
                                    <input type="text" name="coato" class="form-control" value="{{ $district->coato }}" required>
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
