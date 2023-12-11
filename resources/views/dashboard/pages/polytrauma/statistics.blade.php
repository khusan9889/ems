@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">Политравма Статистика {{ request()->branch }}</h1>
    <x-form.date-range-filter :branches="$branches" />

    <x-panel>
        <div class="table-responsive ">
            <table class="table table-striped table-bordered">
                <ul class="nav nav-tabs bg-light" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link{{ Request::route()->getName() == 'statistics' ? ' active' : '' }}" aria-current="page" href="{{ route('statistics') }}">
                            Все
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ Request::route()->getName() == 'less16' ? ' active' : '' }}" href="{{ route('less16') }}">
                           ISS < 16
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ Request::route()->getName() == 'more16' ? ' active' : '' }}" href="{{ route('more16') }}">
                           ISS > 16
                        </a>
                    </li>
                </ul>
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



