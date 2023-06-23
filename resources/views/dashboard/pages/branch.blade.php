@extends('dashboard.layouts.default')
@php
    $selectedID = null;
    $order = request()->sort;
@endphp

@section('content')
<x-panel title="Субъекты в СЭМП">
    <h4 class="panel-title">Субъекты в СЭМП</h4>
    <div class="table-responsive">
        <table id="data-table-default" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Субъект</th>

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
