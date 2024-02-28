@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Касалхонани таҳрирлаш">

         <form method="POST" action="{{ route('hospital.update', ['id' => $hospital->id]) }}">
    @csrf
    @method('PUT')
    <table class="table table-striped table-bordered align-middle">
        <tbody>
{{--        <tr>--}}
{{--            <th>№</th>--}}
{{--            <td>{{ $hospital->id }}</td>--}}
{{--        </tr>--}}
        <tr>
            <th>Касалхона номи</th>
            <td>
                <input type="text" name="name" class="form-control" value="{{ $hospital->name }}" required>
            </td>
        </tr>
        <tr>
            <th>Вилоятни танланг</th>
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
            <th>Туманни танланг</th>
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
        <button type="submit" class="btn btn-primary ">Сақлаш</button>
    </div>
    </form>

    </x-panel>
@endsection
