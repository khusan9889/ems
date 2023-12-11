@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">ОКС Статистика {{ request()->branch }}</h1>
    <x-form.date-range-filter :branches="$branches" />
    <x-panel>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Индикаторы/Ko'rsatkichlar</th>
                        <th>Результат/Natija (%)</th>
                    </tr>
                </thead>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['value'] }}%</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </x-panel>
@endsection
