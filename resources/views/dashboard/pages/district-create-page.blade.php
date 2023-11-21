@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Создание нового района">
        <form method="POST" action="{{ route('district.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                    <tr>
                        <th>Выберите область</th>
                        <td>
                            <select class="form-control"  name="region_id" readonly>
                                @foreach ($regions as $key => $region)
                                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}
                                    @if (auth()->user()->region_id == $region->id) selected @endif>
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
                            <input type="text" name="name" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Район СОАТО</th>
                        <td>
                            <input type="text" name="coato" class="form-control" required>
                        </td>
                    </tr>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary pull-right ">Создать</button>
        </form>
    </x-panel>
@endsection
