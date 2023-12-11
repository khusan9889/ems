@extends('dashboard.layouts.default')

@section('content')
<h1 class="page-header">Филиал в СЭМП/Filiallar</h1>
<x-panel>
    <div class="table-responsive">
        <table id="data-table-default" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th style="width: 60px;">№</th>
                    <th>Субъект/Filial</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($branches as $key => $branch)
                <tr>
                    <td>{{ $branch->id }}</td>
                    <td>{{ $branch->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-panel>

@endsection
