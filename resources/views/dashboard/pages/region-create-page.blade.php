@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Янги майдон яратиш">
        <form method="POST" action="{{ route('region.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                    <tr>
                        <th>Вилоят номи</th>
                        <td>
                            <input type="text" name="name" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th>СОАТО</th>
                        <td>
                            <input type="text" name="coato" class="form-control" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary pull-right ">Сақлаш<br>Сохранить</button>
        </form>
    </x-panel>
@endsection
