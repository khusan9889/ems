@extends('dashboard.layouts.default')

@section('content')

    <h1 class="page-header">Политравма-Статистика</h1>
    <x-form.date-range-filter/>

    <x-panel>
        <div class="table-responsive ">
            <table class="table table-striped table-bordered">


                <ul class="nav nav-tabs bg-light" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" aria-current="page" href="#">Все</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><16</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">>25</a>
                    </li>
                </ul>


                <thead>
                <tr>
                    <th>№</th>
                    <th>Индикаторы</th>
                    <th>Результат (%)</th>
                </tr>
                </thead>
                @foreach($data as $index=>$item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['value'] }}%</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </x-panel>

@endsection
