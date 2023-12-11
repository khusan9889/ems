@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Создание новой области/Yangi maydon yaratish">
        <form method="POST" action="{{ route('region.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                    <tr>
                        <th>Название области/Viloyat nomi</th>
                        <td>
                            <input type="text" name="name" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th>СОАТО/SOATO</th>
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
