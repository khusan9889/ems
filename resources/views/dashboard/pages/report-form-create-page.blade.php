@extends('dashboard.layouts.default')
@section('content')

    <ol class="breadcrumb float-xl-end pull-right" >
        <li class="breadcrumb-item active">Еженедельные отчеты</li>
        <li class="breadcrumb-item"><a href="{{route('form.index')}}">Отчеты</a></li>
        <li class="breadcrumb-item active">{{$week->branch->name}}</li>
    </ol>
    <h1 class="page-header">{{$week->branch->name}} - {{$week->week->name}}</h1>

    <x-panel title="Форма отчета">

        <form method="POST" action="{{ route('form.update',['id'=>$week->id]) }}">
            @csrf
            <h3>{{$week->branch->name}} хафталик хисоботи </h3>
            <table class="table table-responsive borderless">
                <thead>
                <tr>
                    <th scope="col-1" class="vertical-align">Филиал</th>
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
                    <td>
                        <pre class="form-control">{{$week->branch->name}}</pre>
                    </td>
                    <td><input class="form-control" name="g_appeal_one" type="number" min="0"
                               value="{{$week->g_appeal}}"></td>
                    <td><input class="form-control" name="g_sleeping_one" type="number" min="0"
                               value="{{$week->g_sleeping}}"></td>
                    <td><input class="form-control" name="g_ambulator_one" type="number" min="0"
                               value="{{$week->g_ambulator}}"></td>
                    <td><input class="form-control" name="y_appeal_one" type="number" min="0"
                               value="{{$week->y_appeal}}"></td>
                    <td><input class="form-control" name="y_sleeping_one" type="number" min="0"
                               value="{{$week->y_sleeping}}"></td>
                    <td><input class="form-control" name="y_ambulator_one" type="number" min="0"
                               value="{{$week->y_ambulator}}"></td>
                    <td><input class="form-control" name="r_appeal_one" type="number" min="0"
                               value="{{$week->r_appeal}}"></td>
                    <td><input class="form-control" name="r_sleeping_one" type="number" min="0"
                               value="{{$week->r_sleeping}}"></td>
                    <td><input class="form-control" name="r_death_one" type="number" min="0"
                               value="{{$week->r_death}}"></td>
                    <td><input class="form-control" name="r_dead_one" type="number" min="0"
                               value="{{$week->r_dead}}">
                    </td>
                </tr>
                </tbody>

            </table>
            <hr>
         <div class="m-5">
             <div class="row mb-3">
                 <div class="col-2">
                     <label>Тез ёрдам:</label>
                     <input type="number" min="0" class="form-control"name="ambulance_03" value="{{$week->ambulance_03}}" placeholder="Тез ёрдам">
                 </div>
                 <div class="col-2">
                     <label>Жумладан болалар:</label>
                     <input type="number" min="0" class="form-control" name="children_03" value="{{$week->children_03}}" placeholder="Жумладан болалар">
                 </div>
                 <div class="col-2">
                     <label>Узи келган:</label>
                     <input type="number" min="0" class="form-control" name="arrived_himself" value="{{$week->arrived_himself}}" placeholder="Узи келган">
                 </div>
                 <div class="col-2">
                     <label>Жумладан болалар:</label>
                     <input type="number" min="0" class="form-control" name="children_arrived_himself" value="{{$week->children_arrived_himself}}" placeholder="Жумладан болалар">
                 </div>
                 <div class="col-2">
                     <label>Йулланма билан келган:</label>
                     <input type="number" min="0" class="form-control" name="came_ticket" value="{{$week->came_ticket}}" placeholder="Йулланма билан келган">
                 </div>
                 <div class="col-2">
                     <label>Жумладан болалар:</label>
                     <input type="number" min="0" class="form-control" name="children_came_ticket" value="{{$week->children_came_ticket}}" placeholder="Жумладан болалар">
                 </div>
             </div>
             <div class="row mb-3">
                 <div class="col-2">
                     <label>Ётқизилган:</label>
                     <input type="number" min="0" class="form-control" name="recumbent" value="{{$week->recumbent}}" placeholder="Ётқизилган">
                 </div>
                 <div class="col-2">
                     <label>Жумладан болалар:</label>
                     <input type="number" min="0" class="form-control" name="children_recumbent" value="{{$week->children_recumbent}}" placeholder="Жумладан болалар">
                 </div>
                 <div class="col-2">
                     <label>Операция:</label>
                     <input type="number" min="0" class="form-control" name="operation" value="{{$week->operation}}" placeholder="Операция">
                 </div>
                 <div class="col-2">
                     <label>Жумладан болалар:</label>
                     <input type="number" min="0" class="form-control" name="children_operation" value="{{$week->children_operation}}" placeholder="Жумладан болалар">
                 </div>
                 <div class="col-2">
                     <label>Юқори технологик операциялар:</label>
                     <input type="number" min="0" class="form-control"  name="high_tech_operas" value="{{$week->high_tech_operas}}" placeholder="Юқори технологик операциялар">
                 </div>
                 <div class="col-2">
                     <label>Жумладан болалар:</label>
                     <input type="number" min="0" class="form-control" name="children_high_tech_operas" value="{{$week->children_high_tech_operas}}" placeholder="Жумладан болалар">
                 </div>
             </div>
             <div class="row mb-5">
                 <div class="col-2">
                     <label>Умерло:</label>
                     <input type="number" min="0" class="form-control" name="death" value="{{$week->death}}" placeholder="Умерло">
                 </div>
                 <div class="col-2">
                     <label>Жумладан болалар:</label>
                     <input type="number" min="0" class="form-control"  name="children_death" value="{{$week->children_death}}" placeholder="Жумладан болалар">
                 </div>
                 <div class="col-2">
                     <label>Амбулатор:</label>
                     <input type="number" min="0" class="form-control" name="ambulator" value="{{$week->ambulator}}" placeholder="Амбулатор">
                 </div>
                 <div class="col-2">
                     <label>Жумладан болалар:</label>
                     <input type="number" min="0" class="form-control" name="children_ambulator" value="{{$week->children_ambulator}}" placeholder="Жумладан болалар">
                 </div>
                 <div class="col-2">
                     <label>Амбулатор операциялар:</label>
                     <input type="number" min="0" class="form-control" name="ambulatory_operas" value="{{$week->ambulatory_operas}}" placeholder="Амбулатор операциялар">
                 </div>
                 <div class="col-2">
                     <label>Жумладан болалар:</label>
                     <input type="number" min="0" class="form-control" name="including_children" value="{{$week->including_children}}" placeholder="Жумладан болалар">
                 </div>
             </div>
         </div>
            <hr>
            <h3>Субфиллиалларнинг қабул бўлимларини {{$week->week->name}} йил хафталик хисоботи</h3>
            <table class="table table-responsive borderless ">
                <thead>
                <tr>
                    <th scope="col-1" class="vertical-align">Субфилиал</th>
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

            <button type="submit" class="btn btn-primary pull-right">Сохранить</button>
        </form>
    </x-panel>
@endsection
