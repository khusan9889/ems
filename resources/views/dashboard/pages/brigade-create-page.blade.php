@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Янги жамоани яратиш">
        <form method="POST" action="{{ route('brigade.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                    <tr>
                        <th>Бригада номи</th>
                        <td>
                            <input type="text" name="name" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
{{--                        <th>Номер бригады/Brigada raqami</th>--}}
{{--                        <td>--}}
{{--                            <input type="number" name="brigade_number" class="form-control" required>--}}
{{--                        </td>--}}
                    </tr>
                    <tr>
                        <th>Подстанцияни танланг</th>
                        <td>
                            <select class="form-control"  name="substation_id" readonly>
                                @foreach ($substations as $key => $substation)
                                    <option value="{{ $substation->id }}" {{ old('substation_id') == $substation->id ? 'selected' : '' }}>
                                        {{ $substation->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('substation_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary pull-right ">Сақлаш</button>
        </form>
    </x-panel>
@endsection
