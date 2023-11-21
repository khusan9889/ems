@extends('dashboard.layouts.default')
@section('content')

    <h1 class="page-header">Редактировать область</h1>
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
                                <th>Выберите область</th>
                                <td>
                                    <select class="form-control"  name="region_coato" readonly>
                                        @foreach ($regions as $key => $region)
                                            <option value="{{ $region->coato }}" {{ $hospital->region_coato == $region->coato ? 'selected' : '' }}>
                                                {{ $region->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('region_coato')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Выберите район</th>
                                <td>
                                    <select class="form-control"  name="district_coato" readonly>
                                        @foreach ($districts as $key => $district)
                                            <option value="{{ $district->coato }}" {{ $hospital->district_coato == $district->coato ? 'selected' : '' }}>
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('district_coato')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
