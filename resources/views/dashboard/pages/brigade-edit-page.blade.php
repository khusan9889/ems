@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Жамоани яратиш таҳрирлаш">
    <div class="row justify-content-center">
        <div class="col-md-12">

{{--                    <div class="d-flex justify-content-between align-items-center mb-3">--}}
{{--                        <a href="{{ url('/brigade') }}" class="btn btn-secondary btn-sm">--}}
{{--                            <i class="fas fa-arrow-left"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <form method="POST" action="{{ route('brigade.update', ['id' => $brigade->id]) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
{{--                            <tr>--}}
{{--                                <th>№</th>--}}
{{--                                <td>{{ $brigade->id }}</td>--}}
{{--                            </tr>--}}
                            <tr>
                                <th>Подстанцияни танланг</th>
                                <td>
                                    <select class="form-control"  name="substation_id">
                                        @foreach ($substations as $key => $substation)
                                            <option value="{{ $substation->id }}" {{ old('substation_id') == $substation->id ? 'selected' : '' }}
                                            @if ($brigade->substation_id == $substation->id) selected @endif>
                                                {{ $substation->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('substation_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Бригада номи </th>
                                <td>
                                    <input type="text" name="name" class="form-control" value="{{ $brigade->name }}" required>
                                </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <th>Номер бригады/Brigada raqami </th>--}}
{{--                                <td>--}}
{{--                                    <input type="text" name="brigade_number" class="form-control" value="{{ $brigade->brigade_number }}" required>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary ">Сақлаш</button>
                        </div>
                    </form>
                </div>

    </div>
    </x-panel>

@endsection
