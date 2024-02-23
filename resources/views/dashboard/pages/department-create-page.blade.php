@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Отделения - создание нового отделения">
        <form method="POST" action="{{ route('department.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                    <tr>
                        <th>Филиал танланг</th>
                        <td>
                            <select class="form-control" id="branch" name="branch_id" readonly>
                                <option value="" hidden>Выберите субъект</option>
                                @foreach ($branches as $key => $branch)
                                    <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}
                                        @if (auth()->user()->branch_id == $branch->id) selected @endif>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('branch_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Бўлим номи</th>
                        <td>
                            <input type="text" name="name" class="form-control" required>
                        </td>
                    </tr>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary pull-right ">Создать</button>
        </form>
    </x-panel>
@endsection
