@extends('dashboard.layouts.default')
@section('content')

    <ol class="breadcrumb float-xl-end pull-right">
        <li class="breadcrumb-item active">Еженедельные отчеты</li>
        <li class="breadcrumb-item"><a href="{{route('form.index')}}">Отчеты</a></li>
        <li class="breadcrumb-item active">{{$week->branch->name}}</li>
    </ol>
    <h1 class="page-header">{{$week->branch->name}} - {{$week->week->name}}</h1>

    <x-panel title="Форма отчета">


            <h3>Филиал ва субфилиалларнинг қабул бўлимларини {{$week->week->name}} йил хафталик хисоботи</h3>
            <div class="d-flex">
                <table  class="table table-bordered" style="width: 80%">
                <thead>
                <tr>
                    <th scope="col-1" class="vertical-align">Филиал ва субфилиал номи</th>
                    <th scope="col" colspan="3" style="background: olivedrab;text-align:center">Яшил зона оркали</th>
                    <th scope="col" colspan="3" style="background: yellow;text-align:center">Сарик зона оркали</th>
                    <th scope="col" colspan="4" style="background: red;text-align:center">Кизил зона оркали</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="col-1">Номи</th>
                    <th scope="col">мурожаат</th>
                    <th scope="col">ёткизилгани</th>
                    <th scope="col">амбулатор</th>
                    <th scope="col">мурожаат</th>
                    <th scope="col">ёткизилгани</th>
                    <th scope="col">амбулатор</th>
                    <th scope="col">мурожаат</th>
                    <th scope="col">ёткизилгани</th>
                    <th scope="col">вафот этгани</th>
                    <th scope="col">мурда акт</th>
                </tr>
                <tr>
                    <td>{{$week->branch->name}}</td>
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
                <table class="table table-striped table-bordered" style="width: 20%">
                    <thead>
                    <tr>
                        <th scope="col" colspan="2" class="text-center" >{{$week->branch->name}} - {{$week->week->name}} йил хафталик хисоботи</th>
                    </tr>
                    <tr>
                        <th scope="col" >Кўрсаткичлар номи</th>
                        <th scope="col" >филиал</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>Жами мурожаатлар</td>
                        <td>{{$week->ambulance_03+$week->arrived_himself+$week->came_ticket}}</td>
                    </tr>
                    <tr>
                        <td>жумладан болалар</td>
                        <td>{{$week->children_03+$week->children_arrived_himself+$week->children_came_ticket}}</td>
                    </tr>
                    <tr>
                        <td>Тез ёрдам</td>
                        <td>{{$week->ambulance_03}}</td>
                    </tr>
                    <tr>
                        <td>Жумладан болалар</td>
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

    </x-panel>
@endsection
