@extends('dashboard.layouts.default')

@section('title', 'Дашборд')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Дашборд</a></li>
	<li class="breadcrumb-item active">Дашборд</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Дашборд</h1>
<!-- end page-header -->


<!-- changing panel name according url -->
@if(request()->is('polytrauma'))
    <x-panel title="Политравма">
        @include('polytrauma.index')
    </x-panel>
@else
    <x-panel title="ОКС">
        @include('acs.index')
    </x-panel>
@endif



<!-- end panel -->
@endsection
