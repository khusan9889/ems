@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')

    <ol class="breadcrumb float-xl-end pull-right">
        <li class="breadcrumb-item active">Еженедельные отчеты</li>
        <li class="breadcrumb-item active">Отчеты</li>
    </ol>
    <h1 class="page-header">Отчеты</h1>
    <x-panel>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Филиал</th>
                    <th>Неделя</th>
                    <th>Статус</th>
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
                            <select class="form-control form-control-sm" name="branch"
                                    @if (auth()->user()->branch_id != 1) disabled @endif>
                                <option value="" style="font-size: 12px;">Все</option>
                                @foreach ($branches as $id => $name)
                                    <option value="{{ $id }}" style="font-size: 12px;"
                                            @if ($id == request('branch') || (auth()->user()->branch_id == $id && auth()->user()->branch_id != 1))
                                                selected
                                        @endif>{{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control form-control-sm" name="week">
                                <option value="" style="font-size: 12px;">Все</option>
                                @foreach ($weeks as $id => $week)
                                    <option value="{{ $id }}" style="font-size: 12px;"
                                            @if ($id == request('week') || (auth()->user()->branch_id == $id && auth()->user()->branch_id != 1))
                                                selected
                                        @endif
                                    >{{ $week }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control form-control-sm" name="status">
                                <option value="" style="font-size: 12px;">Все</option>
                                <option value="Измененный" style="font-size: 12px;">Измененный</option>
                                <option value="Не изменилось" style="font-size: 12px;">Не изменилось</option>
                            </select>
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
                        <td>{{ $item->branch->name }}</td>
                        <td>{{ $item->week->name }}</td>
                        <td @if ($item->status=="Не изменилось")
                                style="color: red"
                            @else
                                style="color: green"
                            @endif
                        >{{ $item->status }}</td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('form.edit', $item->id) }}"
                                   class="btn btn-primary btn-xs mr-1">
                                    <i class="fas fa-pen"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-panel>

    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>

@endsection
