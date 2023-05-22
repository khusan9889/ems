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

<!-- begin panel -->

<x-panel title="ACS List">
	@include('acs.index')
</x-panel>

<x-panel title="Polytrauma">
	@include('polytrauma.index')
</x-panel>

</div>
<!-- end panel -->
@endsection


