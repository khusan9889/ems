@extends('dashboard.layouts.default')
@section('content')

    <ol class="breadcrumb float-xl-end pull-right">
        <li class="breadcrumb-item active">Еженедельные отчеты</li>
        <li class="breadcrumb-item"><a href="{{route('form.index')}}">Отчеты</a></li>
        <li class="breadcrumb-item active">{{$week->branch->name}}</li>
    </ol>
    <h1 class="page-header">{{$week->branch->name}} - {{$week->week->name}}</h1>

    <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-unlimited-tabs-2">
        <div class="panel-heading p-0">
            <div class="tab-overflow">
                <ul class="nav nav-tabs">
                    <li class="nav-item prev-button">
                        <a href="javascript:" data-click="prev-tab" class="text-inverse nav-link"><i
                                class="fa fa-arrow-left"></i></a>
                    </li>

                        <li class="nav-item">
                            <a href="#nav-tab-1" data-toggle="tab"
                               class="nav-link active">Филиал ва субфилиалларнинг қабул бўлимлари</a>
                        </li>
                        <li class="nav-item">
                            <a href="#nav-tab-2" data-toggle="tab"
                               class="nav-link">{{$week->branch->name}}</a>
                        </li>

                </ul>
            </div>
            <div class="panel-heading-btn mr-2 ml-2 d-flex">
                <a href="javascript:" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
            </div>
        </div>

            <div class="panel-body tab-content">
                    <div class="tab-pane fade active show" id="nav-tab-1">
                        <div class="d-flex">
                            <table  class="table table-responsive table-bordered">

                                <thead>
                                <tr>
                                    <th scope="col" colspan="6"></th>
                                    <th scope="col" colspan="3" style="background: olivedrab;text-align:center">шундан, яшил зона оркали</th>
                                    <th scope="col" colspan="3" style="background: yellow;text-align:center">шундан, сарик зона оркали</th>
                                    <th scope="col" colspan="4" style="background: red;text-align:center">шундан, кизил зона оркали</th>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="col-1">Филиал ва субфилиал номи</th>
                                    <th class="text-nowrap" scope="col">Жами мурожаатлар</th>
                                    <th class="text-nowrap" scope="col">Шундан, ёткизилгани</th>
                                    <th class="text-nowrap" scope="col">Шундан, амбулатор</th>
                                    <th class="text-nowrap" scope="col">Шундан, вафот этгани</th>
                                    <th class="text-nowrap" scope="col">Мурда акт</th>
                                    <th class="text-nowrap" scope="col">мурожаат</th>
                                    <th class="text-nowrap" scope="col">шундан, ёткизилгани</th>
                                    <th class="text-nowrap" scope="col">шундан, амбулатор</th>
                                    <th class="text-nowrap" scope="col">мурожаат</th>
                                    <th class="text-nowrap" scope="col">шундан, ёткизилгани</th>
                                    <th class="text-nowrap" scope="col">шундан, амбулатор</th>
                                    <th class="text-nowrap" scope="col">мурожаат</th>
                                    <th class="text-nowrap" scope="col">шундан, ёткизилгани</th>
                                    <th class="text-nowrap" scope="col">шундан, вафот этгани</th>
                                    <th class="text-nowrap" scope="col">мурда акт</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>{{$week->branch->name}}</td>
                                    <td>{{$week->g_appeal+$week->y_appeal+$week->r_appeal}}</td>
                                    <td>{{$week->g_sleeping+$week->y_sleeping+$week->r_sleeping}}</td>
                                    <td>{{$week->g_ambulator+$week->y_ambulator}}</td>
                                    <td>{{$week->r_death}}</td>
                                    <td>{{$week->r_dead}}</td>
                                    <td>{{$week->g_appeal}}</td>
                                    <td>{{$week->g_sleeping}}</td>
                                    <td>{{$week->g_ambulator}}</td>
                                    <td>{{$week->y_appeal}}</td>
                                    <td>{{$week->y_sleeping}}</td>
                                    <td>{{$week->y_ambulator}}</td>
                                    <td>{{$week->r_appeal}}</td>
                                    <td>{{$week->r_sleeping}}</td>
                                    <td>{{$week->r_death}}</td>
                                    <td>{{$week->r_dead}}</td>
                                </tr>

                                @foreach ($filial_sub_weeks as $key => $data)
                                    <tr>
                                        <td>{{ $data?->sub_filial }}</td>
                                        <td>{{$data->g_appeal+$data->y_appeal+$data->r_appeal}}</td>
                                        <td>{{$data->g_sleeping+$data->y_sleeping+$data->r_sleeping}}</td>
                                        <td>{{$data->g_ambulator+$data->y_ambulator}}</td>
                                        <td>{{$data->r_death}}</td>
                                        <td>{{$data->r_dead}}</td>
                                        <td>{{$data->g_appeal}}</td>
                                        <td>{{$data->g_sleeping}}</td>
                                        <td>{{$data->g_ambulator}}</td>
                                        <td>{{$data->y_appeal}}</td>
                                        <td>{{$data->y_sleeping}}</td>
                                        <td>{{$data->y_ambulator}}</td>
                                        <td>{{$data->r_appeal}}</td>
                                        <td>{{$data->r_sleeping}}</td>
                                        <td>{{$data->r_death}}</td>
                                        <td>{{$data->r_dead}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>


                    </div>
                    <div class="tab-pane fade " id="nav-tab-2">
                        <table class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center" ></th>
                            </tr>
                            <tr>
                                <th scope="col" >Кўрсаткичлар номи</th>
                                <th scope="col" >Филиал</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>Жами мурожаатлар</td>
                                <td>{{$week->ambulance_03+$week->arrived_himself+$week->came_ticket}}</td>
                            </tr>
                            <tr>
                                <td>Жумладан болалар</td>
                                <td>{{$week->children_03+$week->children_arrived_himself+$week->children_came_ticket}}</td>
                            </tr>
                            <tr>
                                <td>03-тез ёрдам</td>
                                <td>{{$week->ambulance_03}}</td>
                            </tr>
                            <tr>
                                <td>Жумладан <бо></бо>лалар</td>
                                <td>{{$week->children_03}}</td>
                            </tr>
                            <tr>
                                <td>Узи келган</td>
                                <td>{{$week->arrived_himself}}</td>
                            </tr>
                            <tr>
                                <td>Жумладан болалар</td>
                                <td>{{$week->children_arrived_himself}}</td>
                            </tr>
                            <tr>
                                <td>Йулланма билан келган</td>
                                <td>{{$week->came_ticket}}</td>
                            </tr>
                            <tr>
                                <td>Жумладан болалар</td>
                                <td>{{$week->children_came_ticket}}</td>
                            </tr>
                            <tr>
                                <td>Операция</td>
                                <td>{{$week->operation}}</td>
                            </tr>
                            <tr>
                                <td>Жумладан болалар</td>
                                <td>{{$week->children_operation}}</td>
                            </tr>
                            <tr>
                                <td>Юқори технологик операциялар</td>
                                <td>{{$week->high_tech_operas}}</td>
                            </tr>
                            <tr>
                                <td>Жумладан болалар</td>
                                <td>{{$week->children_high_tech_operas}}</td>
                            </tr>
                            <tr>
                                <td>Умерло</td>
                                <td>{{$week->death}}</td>
                            </tr>
                            <tr>
                                <td>Жумладан болалар</td>
                                <td>{{$week->children_death}}</td>
                            </tr>
                            <tr>
                                <td>Амбулатор</td>
                                <td>{{$week->ambulator}}</td>
                            </tr>
                            <tr>
                                <td>Жумладан болалар</td>
                                <td>{{$week->children_ambulator}}</td>
                            </tr>
                            <tr>
                                <td>Амбулатор операциялар</td>
                                <td>{{$week->ambulatory_operas}}</td>
                            </tr>
                            <tr>
                                <td>Жумладан болалар</td>
                                <td>{{$week->including_children}}</td>
                            </tr>
                        </table>
                    </div>

            </div>

    </div>
@endsection
