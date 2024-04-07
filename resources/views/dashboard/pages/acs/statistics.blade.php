@extends('dashboard.layouts.default')

@section('content')
    <x-form.date-range-filter :branches="$branches" />
    <x-panel title="ОКС статистика">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Индикаторы/Кўрсаткичлар</th>
                        <th>Результат/Натижа (%)</th>
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
