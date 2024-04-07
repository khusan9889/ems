@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')

    <!-- begin row -->
    <div class="row p-10">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green-darker">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-title">Пользователь в индикаторах</div>
                <div class="stats-number">{{$users}}</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
                <div class="stats-title">Филиал</div>
                <div class="stats-number">{{$branches}}</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->

        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-black">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
                <div class="stats-title">Субфилиал</div>
                <div class="stats-number">{{$sub}}</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-black-darker">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
                <div class="stats-title">Пользовательские данные</div>
                <table class="table table-profile">
                    <tbody>
                    <tr>
                        <td class="field" style="color: white">{{$user->role?->name}}</td>
                        <td style="color: white"><i class="fa fa-lg m-r-5"></i> {{$user->branch?->name}} </td>
                    </tr>
                    </tbody>
                </table>

                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
    <div class="row p-10">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <div class="panel panel-inverse" data-sortable-id="index-12">
                <div class="panel-heading">

                    <h4 class="panel-title"> Активности</h4>
                </div>
                <div class="panel-body p-t-0">
                    <table class="table table-valign-middle m-b-0">
                        <table class="table table-striped align-middle">
                            <thead>
                            <tr>
                                <th style="width: 60px;">№</th>
                                <th>Действия</th>
                                <th>Пользователь</th>
                                <th>Дата и время</th>
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
                        <div class="d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>

                    </table>
                </div>
            </div>

        </div>
        <!-- end col-12 -->
    </div>


@endsection
