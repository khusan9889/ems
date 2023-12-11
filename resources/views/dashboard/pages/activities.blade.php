@extends('dashboard.layouts.default')

@section('content')
<h1 class="page-header">Активности</h1>
<x-panel>
    <div class="table-responsive">
        <table id="data-table-default" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th style="width: 60px;">№</th>
                    <th>Действия/Harakatlar</th>
                    <th>Пользователь/Foydalanuvchi</th>
                    <th>Дата и время/Sana va vaqt</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->user->name }}, {{ $item->user->email }}</td>
                    <td>{{ localDatetime($item->created_at) }}</td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>


</x-panel>
<!-- Pagination links -->
<div class="d-flex justify-content-center">
    {{ $data->links() }}
</div>
@endsection


