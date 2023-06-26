@extends('dashboard.layouts.default')

@section('content')

    <h1 class="page-header">ОКС-Статистика</h1>
    <x-form.date-range-filter/>
    <x-panel>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Индикаторы</th>
                    <th>Резултат (%)</th>
                </tr>
                </thead>
                @foreach($data as $index=>$item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['value'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </x-panel>

@endsection
