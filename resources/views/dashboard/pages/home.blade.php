@extends('dashboard.layouts.default')

@section('title', 'Дашборд')

@section('content')
    <!-- begin breadcrumb -->
    {{-- <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">++++</a></li>
        <li class="breadcrumb-item active">Дашборд</li>
    </ol> --}}
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Дашборд</h1>
    <!-- end page-header -->

    <!-- changing panel name according to the URL -->
    @if (request()->is('polytrauma'))
        <x-panel title="Политравма">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="panel-title">Политравма</h4>
                <a href="{{ route('polytrauma.polyt-create-page') }}" class="btn btn-success">Добавить</a>
            </div>
            @include('polytrauma.index', ['branches' => $branches])
        </x-panel>
    @elseif (request()->is('users'))
        <x-panel title="Пользователи">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="panel-title">Пользователи</h4>
                <a href="{{ route('polytrauma.polyt-create-page') }}" class="btn btn-success">Добавить</a>
            </div>
            @include('dashboard.pages.users', ['branches' => $branches])
        </x-panel>
    @else
        <x-panel title="ОКС">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="panel-title">ОКС</h4>
                <a href="{{ route('acs.create-page') }}" class="btn btn-success">Добавить</a>
            </div>
            @include('acs.index', ['branches' => $branches])
        </x-panel>
    @endif
@endsection
