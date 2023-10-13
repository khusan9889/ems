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


@endsection
