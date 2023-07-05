@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Отделения - создание нового отделения">
        <form method="POST" action="{{ route('department.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                    <tr>
                        <th>Субъект</th>
                        <td>
                            <select class="form-control" id="branch" name="branch_id" @disabled(auth()->user()->branch_id !== 1 && auth()->user()->branch_id !== null)>
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
                        <th>Название отделения</th>
                        <td>
                            <input type="text" name="name" class="form-control" required>
                        </td>
                    </tr>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </x-panel>
@endsection
