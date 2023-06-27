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
                            <select class="form-control" name="branch_id" required>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">
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
