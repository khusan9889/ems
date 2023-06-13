@extends('dashboard.layouts.default')
@php
    $selectedID = null;
    $order = request()->sort;
@endphp



@section('content')
<x-panel title="Пользователи в СЭМП">
<h4 class="panel-title">Пользователи</h4>
    <div class="table-responsive">
        <table id="data-table-default" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Субъект СЭМП</th>
                    <th>Отделение</th>
                    <th>ФИО пользователя</th>
                    <th>Номер телефона</th>
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
                        <select class="form-control form-control-sm" name="branch">
                            <option value="" style="font-size: 12px;">Все</option>
                                @foreach ($branches as $id => $name)
                                <option value="{{ $id }}" style="font-size: 12px;"
                                    @if ($id == request('branch')) selected @endif>{{ $name }}</option>
                                @endforeach
                            </select>
                        </select>
                    </td>
                    <td>
                        <select class="form-control form-control-sm" name="branch">
                            <option value="" style="font-size: 12px;">Все</option>
                            {{-- @foreach ($branches as $id => $name)
                                <option value="{{ $id }}" style="font-size: 12px;"
                                    @if ($id == request('branch')) selected @endif>{{ $name }}</option>
                            @endforeach --}}
                        </select>
                    </td>
                    <td>
                        <input class="form-control form-control-sm" type="text" name="name"
                            value="{{ request('name') }}">
                    </td>
                    <td>
                        <input class="form-control form-control-sm" type="text" name="phone_number"
                            value="{{ request('phone_number') }}">
                    </td>
                    <td class="align-middle d-flex justify-content-center">
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary">Применить</button>
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->branch->name }}</td>
                    <td>{{ $item->department }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ $item->email }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-panel>

@endsection


