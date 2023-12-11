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
                               class="nav-link active">Филиал ва субфилиалларнинг қабул бўлимларини {{$week->week->name}} йил хафталик хисоботи</a>
                        </li>
                        <li class="nav-item">
                            <a href="#nav-tab-2" data-toggle="tab"
                               class="nav-link">{{$week->branch->name}} - {{$week->week->name}} йил хафталик хисоботи</a>
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
                                    <th scope="col" colspan="3" style="background: olivedrab;text-align:center">Через зеленую зону/Yashil zona orqali</th>
                                    <th scope="col" colspan="3" style="background: yellow;text-align:center">Через желтую зону/Sariq zona orqali</th>
                                    <th scope="col" colspan="4" style="background: red;text-align:center">Через красную зону/Qizil zona orqali</th>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="col-1">Название филиала и филиала/Filial va subfilial nomi</th>
                                    <th class="text-nowrap" scope="col">Общее количество апелляций/Murojaatlarning umumiy soni</th>
                                    <th class="text-nowrap" scope="col">Из них госпитализировано/Shundan yotqizilganlar</th>
                                    <th class="text-nowrap" scope="col">Из них амбулаторные/Shundan ambulator</th>
                                    <th class="text-nowrap" scope="col">Из них те, кто погиб/Shundan, vafot etganlar</th>
                                    <th class="text-nowrap" scope="col">Мурда акт</th>
                                    <th class="text-nowrap" scope="col">Обжалование/Murojaat</th>
                                    <th class="text-nowrap" scope="col">Это заложено/Yotqizilgani</th>
                                    <th class="text-nowrap" scope="col">Амбулаторный/Ambulatoriya</th>
                                    <th class="text-nowrap" scope="col">Обжалование/Murojaat</th>
                                    <th class="text-nowrap" scope="col">Это заложено/Yotqizilgani</th>
                                    <th class="text-nowrap" scope="col">Амбулаторный/Ambulatoriya</th>
                                    <th class="text-nowrap" scope="col">Обжалование/Murojaat</th>
                                    <th class="text-nowrap" scope="col">Это заложено/Yotqizilgani</th>
                                    <th class="text-nowrap" scope="col">Он умер/Vafot etgani</th>
                                    <th class="text-nowrap" scope="col">мурда акт</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>{{$week->branch->name}}</td>
                                    <td>{{$week->g_appeal+$week->y_appeal+$week->r_appeal}}</td>
                                    <td>{{$week->g_sleeping+$week->y_sleeping+$week->r_sleeping}}</td>
                                    <td>{{$week->g_ambulator+$week->y_ambulator+$week->r_death}}</td>
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
                                        <td>{{ $data->sub_filial->name }}</td>
                                        <td>{{$data->g_appeal+$data->y_appeal+$data->r_appeal}}</td>
                                        <td>{{$data->g_sleeping+$data->y_sleeping+$data->r_sleeping}}</td>
                                        <td>{{$data->g_ambulator+$data->y_ambulator+$data->r_death}}</td>
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
                                <th scope="col" >Название индикатора/Ko‘rsatkichlar nomi</th>
                                <th scope="col" >филиал/filial</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>Всего апелляций/Jami murojaatlar</td>
                                <td>{{$week->ambulance_03+$week->arrived_himself+$week->came_ticket}}</td>
                            </tr>
                            <tr>
                                <td>включая детей/jumladan, bolalar</td>
                                <td>{{$week->children_03+$week->children_arrived_himself+$week->children_came_ticket}}</td>
                            </tr>
                            <tr>
                                <td>Быстрая помощь/Tez yordam:</td>
                                <td>{{$week->ambulance_03}}</td>
                            </tr>
                            <tr>
                                <td>включая детей/jumladan, bolalar</td>
                                <td>{{$week->children_03}}</td>
                            </tr>
                            <tr>
                                <td>Те, кто пришел сам/O'zi kelganlar</td>
                                <td>{{$week->arrived_himself}}</td>
                            </tr>
                            <tr>
                                <td>включая детей/jumladan, bolalar</td>
                                <td>{{$week->children_arrived_himself}}</td>
                            </tr>
                            <tr>
                                <td>Пришёл по рекомендации/Yo‘llanma bilan kelgan</td>
                                <td>{{$week->came_ticket}}</td>
                            </tr>
                            <tr>
                                <td>включая детей/jumladan, bolalar</td>
                                <td>{{$week->children_came_ticket}}</td>
                            </tr>
                            <tr>
                                <td>Операция/Operatsiya</td>
                                <td>{{$week->operation}}</td>
                            </tr>
                            <tr>
                                <td>включая детей/jumladan, bolalar</td>
                                <td>{{$week->children_operation}}</td>
                            </tr>
                            <tr>
                                <td>Высокотехнологичные операции/Yuqori texnologiyali operatsiyalar</td>
                                <td>{{$week->high_tech_operas}}</td>
                            </tr>
                            <tr>
                                <td>включая детей/jumladan, bolalar</td>
                                <td>{{$week->children_high_tech_operas}}</td>
                            </tr>
                            <tr>
                                <td>Умерло/O'lgan</td>
                                <td>{{$week->death}}</td>
                            </tr>
                            <tr>
                                <td>включая детей/jumladan, bolalar</td>
                                <td>{{$week->children_death}}</td>
                            </tr>
                            <tr>
                                <td>Амбулатор/Ambulator</td>
                                <td>{{$week->ambulator}}</td>
                            </tr>
                            <tr>
                                <td>включая детей/jumladan, bolalar</td>
                                <td>{{$week->children_ambulator}}</td>
                            </tr>
                            <tr>
                                <td>Амбулаторная хирургия/Ambulator jarrohlik</td>
                                <td>{{$week->ambulatory_operas}}</td>
                            </tr>
                            <tr>
                                <td>включая детей/jumladan, bolalar</td>
                                <td>{{$week->including_children}}</td>
                            </tr>
                        </table>
                    </div>

            </div>

    </div>
@endsection
