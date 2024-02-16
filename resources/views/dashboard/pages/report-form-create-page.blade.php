@extends('dashboard.layouts.default')
@section('content')

    <ol class="breadcrumb float-xl-end pull-right" >
        <li class="breadcrumb-item active">Еженедельные отчеты</li>
        <li class="breadcrumb-item"><a href="{{route('form.index')}}">Отчеты</a></li>
        <li class="breadcrumb-item active">{{$week->branch->name}}</li>
    </ol>
    <h1 class="page-header">{{$week->branch->name}} - {{$week->week->name}}</h1>

    <x-panel title="Форма отчета/Hisobot shakli">

        <form method="POST" action="{{ route('form.update',['id'=>$week->id]) }}">
            @csrf
            <h3>{{$week->branch->name}} хафталик хисоботи </h3>
            <table class="table table-responsive borderless">
                <thead>
                <tr>
                    <th scope="col-1" class="vertical-align">Филиал/Filial</th>
                    <th scope="col" colspan="3" style="background: olivedrab;text-align:center">Через зеленую зону/Yashil zona orqali</th>
                    <th scope="col" colspan="3" style="background: yellow;text-align:center">Через желтую зону/Sariq zona orqali</th>
                    <th scope="col" colspan="4" style="background: red;text-align:center">Через красную зону/Qizil zona orqali</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="text-nowrap" scope="col-1">Название/Nomi</th>
                    <th class="text-nowrap" scope="col">Обжалование/Murojaat</th>
                    <th class="text-nowrap" scope="col">Это заложено/Yotqizilgani</th>
                    <th class="text-nowrap" scope="col">Амбулаторный/Ambulatoriya</th>
                    <th class="text-nowrap" scope="col">Обжалование/Murojaat</th>
                    <th class="text-nowrap" scope="col">Это заложено/Yotqizilgani</th>
                    <th class="text-nowrap" scope="col">Амбулаторный/Ambulatoriya</th>
                    <th class="text-nowrap" scope="col">Обжалование/Murojaat</th>
                    <th class="text-nowrap" scope="col">Это заложено/Yotqizilgani</th>
                    <th class="text-nowrap" scope="col">Он умер/Vafot etgani</th>
                    <th class="text-nowrap" scope="col">Мурда акт/Murda akt</th>
                </tr>
                <tr>
                    <td>
                        <pre class="form-control">{{$week->branch->name}}</pre>
                    </td>
                    <td><input  class="form-control" name="g_appeal_one" type="number" min="0"
                               value="{{$week->g_appeal}}"></td>
                    <td><input  class="form-control" name="g_sleeping_one" type="number" min="0"
                               value="{{$week->g_sleeping}}"></td>
                    <td><input  class="form-control" name="g_ambulator_one" type="number" min="0"
                               value="{{$week->g_ambulator}}"></td>
                    <td><input  class="form-control" name="y_appeal_one" type="number" min="0"
                               value="{{$week->y_appeal}}"></td>
                    <td><input  class="form-control" name="y_sleeping_one" type="number" min="0"
                               value="{{$week->y_sleeping}}"></td>
                    <td><input  class="form-control" name="y_ambulator_one" type="number" min="0"
                               value="{{$week->y_ambulator}}"></td>
                    <td><input  class="form-control" name="r_appeal_one" type="number" min="0"
                               value="{{$week->r_appeal}}"></td>
                    <td><input  class="form-control" name="r_sleeping_one" type="number" min="0"
                               value="{{$week->r_sleeping}}"></td>
                    <td><input  class="form-control" name="r_death_one" type="number" min="0"
                               value="{{$week->r_death}}"></td>
                    <td><input  class="form-control" name="r_dead_one" type="number" min="0"
                               value="{{$week->r_dead}}">
                    </td>
                </tr>
                </tbody>

            </table>
            <hr>
         <div class="m-5">
             <div class="row mb-3">
                 <div class="col-2">
                     <label>Скорая помощь/Tez yordam:</label>
                     <input type="number" min="0" class="form-control"name="ambulance_03" value="{{$week->ambulance_03}}" placeholder="Скорая помощь/Tez yordam">
                 </div>
                 <div class="col-2">
                     <label>Включая детей/Jumladan bolalar:</label>
                     <input type="number" min="0" class="form-control" name="children_03" value="{{$week->children_03}}" placeholder="Включая детей/Jumladan bolalar">
                 </div>
                 <div class="col-2">
                     <label>Те, кто пришел сам/O'zi kelganlar:</label>
                     <input type="number" min="0" class="form-control" name="arrived_himself" value="{{$week->arrived_himself}}" placeholder="Те, кто пришел сам/O'zi kelganlar">
                 </div>
                 <div class="col-2">
                     <label>Включая детей/Jumladan bolalar:</label>
                     <input type="number" min="0" class="form-control" name="children_arrived_himself" value="{{$week->children_arrived_himself}}" placeholder="Включая детей/Jumladan bolalar">
                 </div>
                 <div class="col-2">
                     <label>Пришёл по рекомендации/Yo‘llanma bilan kelgan:</label>
                     <input type="number" min="0" class="form-control" name="came_ticket" value="{{$week->came_ticket}}" placeholder="Йулланма билан келган">
                 </div>
                 <div class="col-2">
                     <label>Включая детей/Jumladan bolalar:</label>
                     <input type="number" min="0" class="form-control" name="children_came_ticket" value="{{$week->children_came_ticket}}" placeholder="Включая детей/Jumladan bolalar">
                 </div>
             </div>
             <div class="row mb-3">
                 <div class="col-2">
                     <label>Госпитализирован/Yotqizilgan:</label>
                     <input type="number" min="0" class="form-control" name="recumbent" value="{{$week->recumbent}}" placeholder="Госпитализирован/Yotqizilgan">
                 </div>
                 <div class="col-2">
                     <label>Включая детей/Jumladan bolalar:</label>
                     <input type="number" min="0" class="form-control" name="children_recumbent" value="{{$week->children_recumbent}}" placeholder="Включая детей/Jumladan bolalar">
                 </div>
                 <div class="col-2">
                     <label>Операция/Operatsiya:</label>
                     <input type="number" min="0" class="form-control" name="operation" value="{{$week->operation}}" placeholder="Операция/Operatsiya">
                 </div>
                 <div class="col-2">
                     <label>Включая детей/Jumladan bolalar:</label>
                     <input type="number" min="0" class="form-control" name="children_operation" value="{{$week->children_operation}}" placeholder="Включая детей/Jumladan bolalar">
                 </div>
                 <div class="col-2">
                     <label>Высокотехнологичные операции/Yuqori texnologiyali operatsiyalar:</label>
                     <input type="number" min="0" class="form-control"  name="high_tech_operas" value="{{$week->high_tech_operas}}" placeholder="Высокотехнологичные операции/Yuqori texnologiyali operatsiyalar">
                 </div>
                 <div class="col-2">
                     <label>Включая детей/Jumladan bolalar:</label>
                     <input type="number" min="0" class="form-control" name="children_high_tech_operas" value="{{$week->children_high_tech_operas}}" placeholder="Включая детей/Jumladan bolalar">
                 </div>
             </div>
             <div class="row mb-5">
                 <div class="col-2">
                     <label>Умерло/O'lgan:</label>
                     <input type="number" min="0" class="form-control" name="death" value="{{$week->death}}" placeholder="Умерло">
                 </div>
                 <div class="col-2">
                     <label>Включая детей/Jumladan bolalar:</label>
                     <input type="number" min="0" class="form-control"  name="children_death" value="{{$week->children_death}}" placeholder="Включая детей/Jumladan bolalar">
                 </div>
                 <div class="col-2">
                     <label>Амбулатор/Ambulator:</label>
                     <input type="number" min="0" class="form-control" name="ambulator" value="{{$week->ambulator}}" placeholder="Амбулатор">
                 </div>
                 <div class="col-2">
                     <label>Включая детей/Jumladan bolalar:</label>
                     <input type="number" min="0" class="form-control" name="children_ambulator" value="{{$week->children_ambulator}}" placeholder="Включая детей/Jumladan bolalar">
                 </div>
                 <div class="col-2">
                     <label>Амбулаторная хирургия/Ambulator jarrohlik:</label>
                     <input type="number" min="0" class="form-control" name="ambulatory_operas" value="{{$week->ambulatory_operas}}" placeholder="Амбулатор операциялар">
                 </div>
                 <div class="col-2">
                     <label>Включая детей/Jumladan bolalar:</label>
                     <input type="number" min="0" class="form-control" name="including_children" value="{{$week->including_children}}" placeholder="Включая детей/Jumladan bolalar">
                 </div>
             </div>
         </div>
            <hr>
            <h3>Субфиллиалларнинг қабул бўлимларини {{$week->week->name}} йил хафталик хисоботи</h3>
            <table class="table table-responsive borderless ">
                <thead>
                <tr>
                    <th class="text-nowrap" scope="col-1" class="vertical-align">Субфилиал</th>
                    <th scope="col" colspan="3" style="background: olivedrab;text-align:center">Через зеленую зону/Yashil zona orqali</th>
                    <th scope="col" colspan="3" style="background: yellow;text-align:center">Через желтую зону/Sariq zona orqali</th>
                    <th scope="col" colspan="4" style="background: red;text-align:center">Через красную зону/Qizil zona orqali</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="text-nowrap" scope="col-1">Название/Nomi</th>
                    <th class="text-nowrap" scope="col">Обжалование/Murojaat</th>
                    <th class="text-nowrap" scope="col">Это заложено/Yotqizilgani</th>
                    <th class="text-nowrap" scope="col">Амбулаторный/Ambulatoriya</th>
                    <th class="text-nowrap" scope="col">Обжалование/Murojaat</th>
                    <th class="text-nowrap" scope="col">Это заложено/Yotqizilgani</th>
                    <th class="text-nowrap" scope="col">Амбулаторный/Ambulatoriya</th>
                    <th class="text-nowrap" scope="col">Обжалование/Murojaat</th>
                    <th class="text-nowrap" scope="col">Это заложено/Yotqizilgani</th>
                    <th class="text-nowrap" scope="col">Он умер/Vafot etgani</th>
                    <th class="text-nowrap" scope="col">Мурда акт/Murda akt</th>
                </tr>

                @foreach ($filial_sub_weeks as $key => $data)
                    <tr>
                        <td>
                            <pre class="form-control">{{ $data->sub_filial->name }}</pre>
                        </td>
                        <td><input class="form-control" name="g_appeal[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->g_appeal}}"></td>
                        <td><input class="form-control" name="g_sleeping[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->g_sleeping}}"></td>
                        <td><input class="form-control" name="g_ambulator[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->g_ambulator}}"></td>
                        <td><input class="form-control" name="y_appeal[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->y_appeal}}"></td>
                        <td><input class="form-control" name="y_sleeping[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->y_sleeping}}"></td>
                        <td><input class="form-control" name="y_ambulator[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->y_ambulator}}"></td>
                        <td><input class="form-control" name="r_appeal[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->r_appeal}}"></td>
                        <td><input class="form-control" name="r_sleeping[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->r_sleeping}}"></td>
                        <td><input class="form-control" name="r_death[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->r_death}}"></td>
                        <td><input class="form-control" name="r_dead[{{$data->id}}]" type="number" min="0"
                                   value="{{$data->r_dead}}"></td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            @if (auth()->user()->role->id==4 or auth()->user()->role->id==1)
                <button type="submit" name="confirm_status" value="1" class="btn btn-primary fa-pull-right">Одобрение</button>
                <button type="submit" name="confirm_status" value="3" class="btn btn-primary fa-pull-right m-r-5">Возврат на доработку</button>
            @else
                <button type="submit" name="confirm_status" value="2" class="btn btn-primary fa-pull-right m-r-5">Подача на одобрение</button>
                <button type="submit" name="confirm_status" value="4" class="btn btn-primary fa-pull-right m-r-5">Сохранять</button>
            @endif
        </form>
    </x-panel>
@endsection
