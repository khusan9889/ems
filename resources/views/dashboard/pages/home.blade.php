@extends('dashboard.layouts.default')

@section('title', 'Дашборд')

@section('content')
    <!-- changing panel name according to the URL -->
    @if (request()->is('polytrauma/list'))
        <x-panel title="Политравма таблица">
            <div class="d-flex justify-content-between mb-3">
                <h2>Политравма таблица</h2>
                <a href="{{ route('polytrauma.polyt-create-page') }}" class="btn btn-success">Добавить</a>
            </div>
            @include('polytrauma.index', ['branches' => $branches])
        </x-panel>
    @else
        <x-panel title="ОКС таблица">
            <div class="d-flex justify-content-between mb-3">
                <h2>ОКС таблица</h2>
                <a href="{{ route('acs.create-page') }}" class="btn btn-success">Добавить</a>
            </div>
            @include('acs.index', ['branches' => $branches])
        </x-panel>
    @endif
@endsection
