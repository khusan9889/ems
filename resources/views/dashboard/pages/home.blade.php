@extends('dashboard.layouts.default')

@section('title', 'Дашборд')

@section('content')

<h1 class="page-header">
    @if (request()->is('polytrauma'))
        Политравма
    @else
        ОКС
    @endif
</h1>
    <!-- end page-header -->

    <!-- changing panel name according to the URL -->
    @if (request()->is('polytrauma'))
        <x-panel>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('polytrauma.polyt-create-page') }}" class="btn btn-success">Добавить</a>
            </div>
            @include('polytrauma.index', ['branches' => $branches])
        </x-panel>
    @else
        <x-panel>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('acs.create-page') }}" class="btn btn-success">Добавить</a>
            </div>
            @include('acs.index', ['branches' => $branches])
        </x-panel>
    @endif
@endsection
