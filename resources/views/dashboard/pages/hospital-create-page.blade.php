@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Создание новой больницы">
        <form method="POST" action="{{ route('hospital.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                <tr>
                    <th>Название больницы</th>
                    <td>
                        <input type="text" name="name" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <th>Выберите область</th>
                    <td>
                        <select class="form-control"  name="region_coato" readonly>
                            @foreach ($regions as $key => $region)
                                <option value="{{ $region->coato }}" {{ old('region_coato') == $region->coato ? 'selected' : '' }}>
                                    {{ $region->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('region_coato')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>

                </tr>
                <tr>
                    <th>Выберите район</th>
                    <td>
                        <select class="form-control"  name="district_coato" readonly>
                            @foreach ($districts as $key => $district)
                                <option value="{{ $district->coato }}" {{ old('district_coato') == $district->coato ? 'selected' : '' }}>
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
            <button type="submit" class="btn btn-primary pull-right ">Создать</button>
        </form>
    </x-panel>
@endsection
