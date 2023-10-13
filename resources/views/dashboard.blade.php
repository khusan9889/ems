@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')

    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-4 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-title">Пользователь в индикаторах</div>
                <div class="stats-number">{{$users}}</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 70.1%;"></div>
                </div>
                <div class="stats-desc">Better than last week (70.1%)</div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-4 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
                <div class="stats-title">Филиал</div>
                <div class="stats-number">{{$branches}}</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 40.5%;"></div>
                </div>
                <div class="stats-desc">Better than last week (40.5%)</div>
            </div>
        </div>
        <!-- end col-3 -->

        <!-- begin col-3 -->
        <div class="col-md-4 col-sm-6">
            <div class="widget widget-stats bg-black">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
                <div class="stats-title">Субфилиал</div>
                <div class="stats-number">{{$sub}}</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 54.9%;"></div>
                </div>
                <div class="stats-desc">Better than last week (54.9%)</div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
    <div class="row bg-light p-10">
        <div class="table-responsive col-md-6 col-sm-6 ">
            <table class="table table-profile">
                <thead>
                <tr>
                    <th>
                        <h4>Пользовательские данные</h4>
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr class="highlight">
                    <td class="field">ФИО Пользователя</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td class="field">Выбрать субъект СЭМП</td>
                    <td><i class="fa fa-lg m-r-5"></i> {{$user->branch?->name}} </td>
                </tr>
                <tr>
                    <td class="field">Выбрать отделение</td>
                    <td><a href="#">{{$user->department?->name}}</a></td>
                </tr>
                <tr>
                    <td class="field">Роль</td>
                    <td>{{$user->role?->name}}</td>
                </tr>

                <tr class="highlight">
                    <td class="field">Номер телефона</td>
                    <td><a href="#">{{$user->phone_number}}</a></td>
                </tr>
                <tr class="highlight">
                    <td class="field">Почта</td>
                    <td><a href="#">{{$user->email}}</a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive col-md-6 col-sm-6">
            <table class="table table-striped align-middle">
                <thead>
                <tr>
                    <th></th>
                    <th>
                        <h4>Активности</h4>
                    </th>
                    <th></th>
                    <th></th>
                </tr>
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

        </div>
    </div>

@endsection
