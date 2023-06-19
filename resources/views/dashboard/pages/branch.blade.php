@extends('dashboard.layouts.default')
@php
    $selectedID = null;
    $order = request()->sort;
@endphp

@section('content')
<x-panel title="Отделения в СЭМП">
    <h4 class="panel-title">Отделения СЭМП</h4>
    <div class="table-responsive">
        <table id="data-table-default" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Отделение</th>
                    <th>Действия</th>
                </tr>
                <tr>
                    <form action="">
                        <td class="align-middle">
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-link btn-sm sort-btn" data-sort-by="id"
                                    onclick="{{ $order = $order === 'ASC' ? 'DESC' : 'ASC' }}">
                                    <i class="fas fa-sort fa-lg"></i>
                                </button>
                                <input type="hidden" name="sort" value="{{ $order }}">
                            </div>
                        </td>
                        <td>
                            <input class="form-control form-control-sm" type="text" name="name"
                                value="{{ request('name') }}">
                        </td>
                        <td class="align-middle d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary">Применить</button>
                            </div>
                        </td>
                    </form>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-panel>

@endsection
