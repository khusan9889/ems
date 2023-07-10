@extends('dashboard.layouts.default')

@section('content')
<h1 class="page-header">Активности</h1>
<x-panel>
    <div class="table-responsive">
        <table id="data-table-default" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th style="width: 60px;">№</th>
                    <th>Действия</th>
                    <th>Пользователь</th>
                    <th>Дата и время</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                </tr>

               @endforeach
            </tbody>
        </table>
    </div>
</x-panel>

@endsection
