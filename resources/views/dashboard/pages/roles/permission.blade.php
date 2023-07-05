@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">{{ $name }}</h1>
    <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-unlimited-tabs-2">
        <div class="panel-heading p-0">
            <div class="tab-overflow">
                <ul class="nav nav-tabs">
                    <li class="nav-item prev-button">
                        <a href="javascript:" data-click="prev-tab" class="text-inverse nav-link"><i
                                class="fa fa-arrow-left"></i></a>
                    </li>

                    @foreach ($modules as $i => $el)
                        <li class="nav-item">
                            <a href="#nav-tab-{{ $el }}" data-toggle="tab"
                                class="nav-link {{ $i == 0 ? 'active' : '' }}">{{ trans('messages.' . $el) }}</a>
                        </li>
                    @endforeach

                    <li class="nav-item next-button">
                        <a href="javascript:" data-click="next-tab" class="text-inverse nav-link"><i
                                class="fa fa-arrow-right"></i></a>
                    </li>
                </ul>
            </div>
            <div class="panel-heading-btn mr-2 ml-2 d-flex">
                <a href="javascript:" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
            </div>
        </div>
        <form action="{{ route('permission.update') }}" method="POST">
            <input type="hidden" name="role_id" value="{{ $id }}">
            @csrf
            <div class="panel-body tab-content">
                @foreach ($modules as $i => $el)
                    <div class="tab-pane fade {{ $i == 0 ? 'active show' : '' }}" id="nav-tab-{{ $el }}">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                @foreach ($data[$el] as $method)
                                    <tr>
                                        <td>{{ trans('messages.' . $method['title']) }}</td>
                                        <td style="width: 20%">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="methods[{{ $method['role_methods'][0]['method_id'] }}]"
                                                    {{ $method['role_methods'][0]['value'] == 1 ? 'checked' : '' }}
                                                    id="{{ $method['method'] }}">
                                                <label class="custom-control-label" for="{{ $method['method'] }}"></label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
                <div class="modal-footer">
                    <a href="{{ route('role.list') }}" class="btn btn-sm btn-inverse pull-left"
                        data-dismiss="modal">Назад</a>
                    <button type="submit" class="btn btn-sm btn-success pull-right">Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
