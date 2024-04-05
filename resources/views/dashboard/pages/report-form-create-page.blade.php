@extends('dashboard.layouts.default')
@section('content')

    <ol class="breadcrumb float-xl-end pull-right">
        <li class="breadcrumb-item active">Еженедельные отчеты</li>
        <li class="breadcrumb-item"><a href="{{route('form.index')}}">Отчеты</a></li>
        <li class="breadcrumb-item active">{{$week->branch->name}}</li>
    </ol>
    <h1 class="page-header f-s-30">{{$week->branch->name}} - {{$week->week->name}}</h1>

    <x-panel title="Форма отчета">

        <form method="POST" action="{{ route('form.update',['id'=>$week->id]) }}">
            @csrf
            <h3>{{$week->branch->name}} хафталик хисоботи </h3>
            <table class="table table-responsive borderless f-s-20">
                <thead>
                <tr>
                    <th scope="col-1" class="vertical-align f-s-20">Филиал номи</th>
                    <th scope="col" colspan="2" style="background: olivedrab;text-align:center">шундан, яшил зона оркали</th>
                    <th scope="col" colspan="2" style="background: yellow;text-align:center">шундан, сарик зона оркали</th>
                    <th scope="col" colspan="3" style="background: red;text-align:center">шундан, кизил зона оркали</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="text-nowrap" scope="col-1 f-s-20">Филиал номи</th>
{{--                    <th class="text-nowrap" scope="col">мурожаат</th>--}}
                    <th class="text-nowrap" scope="col">ёткизилгани</th>
                    <th class="text-nowrap" scope="col">амбулатор</th>
{{--                    <th class="text-nowrap" scope="col">мурожаат</th>--}}
                    <th class="text-nowrap" scope="col">ёткизилгани</th>
                    <th class="text-nowrap" scope="col">амбулатор</th>
{{--                    <th class="text-nowrap" scope="col">мурожаат</th>--}}
                    <th class="text-nowrap" scope="col">ёткизилгани</th>
                    <th class="text-nowrap" scope="col">вафот этгани</th>
                    <th class="text-nowrap" scope="col">мурда акт</th>
                </tr>
                <tr>
                    <td>
                        <pre class="form-control f-s-20">{{$week->branch->name}}</pre>
                    </td>
{{--                    <td><input class="form-control f-s-20" name="g_appeal_one" type="number" min="0"--}}
{{--                               value="{{$week->g_appeal}}"></td>--}}
                    <td><input class="form-control f-s-20" name="g_sleeping_one" type="number" min="0"
                               value="{{$week->g_sleeping}}"></td>
                    <td><input class="form-control f-s-20" name="g_ambulator_one" type="number" min="0"
                               value="{{$week->g_ambulator}}"></td>
{{--                    <td><input class="form-control f-s-20" name="y_appeal_one" type="number" min="0"--}}
{{--                               value="{{$week->y_appeal}}"></td>--}}
                    <td><input class="form-control f-s-20" name="y_sleeping_one" type="number" min="0"
                               value="{{$week->y_sleeping}}"></td>
                    <td><input class="form-control f-s-20" name="y_ambulator_one" type="number" min="0"
                               value="{{$week->y_ambulator}}"></td>
{{--                    <td><input class="form-control f-s-20" name="r_appeal_one" type="number" min="0"--}}
{{--                               value="{{$week->r_appeal}}"></td>--}}
                    <td><input class="form-control f-s-20" name="r_sleeping_one" type="number" min="0"
                               value="{{$week->r_sleeping}}"></td>
                    <td><input class="form-control f-s-20" name="r_death_one" type="number" min="0"
                               value="{{$week->r_death}}"></td>
                    <td><input class="form-control f-s-20" name="r_dead_one" type="number" min="0"
                               value="{{$week->r_dead}}">
                    </td>
                </tr>
                </tbody>

            </table>
            <hr>
            <div class="m-5">
                <div class="row mb-3 f-s-18">
                    <div class="col-2">
                        <label>03-тез ёрдам</label>
                        <input type="number" min="0" class="form-control f-s-20" name="ambulance_03"
                               value="{{$week->ambulance_03}}" placeholder="03-тез ёрдам">
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="children_03"
                               value="{{$week->children_03}}" placeholder="Жумладан болалар">
                    </div>
                    <div class="col-2">
                        <label>Узи келган</label>
                        <input type="number" min="0" class="form-control f-s-20" name="arrived_himself"
                               value="{{$week->arrived_himself}}" placeholder="Узи келган">
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="children_arrived_himself"
                               value="{{$week->children_arrived_himself}}" placeholder="Жумладан болалар">
                    </div>
                    <div class="col-2">
                        <label>Йулланма билан келган</label>
                        <input type="number" min="0" class="form-control f-s-20" name="came_ticket"
                               value="{{$week->came_ticket}}" placeholder="Йулланма билан келган">
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="children_came_ticket"
                               value="{{$week->children_came_ticket}}" placeholder="Жумладан болалар">
                    </div>
                </div>
                <div class="row mb-3 f-s-18">
                    <div class="col-2">
                        <label>Ётқизилган</label>
                        <input type="number" min="0" class="form-control f-s-20" name="recumbent" value="{{$week->recumbent}}"
                               placeholder="Ётқизилган">
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="children_recumbent"
                               value="{{$week->children_recumbent}}" placeholder="Жумладан болалар">
                    </div>
                    <div class="col-2">
                        <label>Операция</label>
                        <input type="number" min="0" class="form-control f-s-20" name="operation" value="{{$week->operation}}"
                               placeholder="Операция">
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="children_operation"
                               value="{{$week->children_operation}}" placeholder="Жумладан болалар">
                    </div>
                    <div class="col-2">
                        <label>Юқори техно операциялар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="high_tech_operas"
                               value="{{$week->high_tech_operas}}"
                               placeholder="Юқори технологик операциялар">
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="children_high_tech_operas"
                               value="{{$week->children_high_tech_operas}}"
                               placeholder="Жумладан болалар">
                    </div>
                </div>
                <div class="row mb-5 f-s-18">
                    <div class="col-2">
                        <label>Ўлганлар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="death" value="{{$week->death}}"
                               placeholder="Ўлганлар">
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="children_death"
                               value="{{$week->children_death}}" placeholder="Жумладан болалар">
                    </div>
                    <div class="col-2">
                        <label>Амбулатор</label>
                        <input type="number" min="0" class="form-control f-s-20" name="ambulator" value="{{$week->ambulator}}"
                               placeholder="Амбулатор">
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="children_ambulator"
                               value="{{$week->children_ambulator}}" placeholder="Жумладан болалар">
                    </div>
                    <div class="col-2">
                        <label>Амбулатор операциялар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="ambulatory_operas"
                               value="{{$week->ambulatory_operas}}" placeholder="Амбулатор операциялар">
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар</label>
                        <input type="number" min="0" class="form-control f-s-20" name="including_children"
                               value="{{$week->including_children}}" placeholder="Жумладан болалар">
                    </div>
                </div>
            </div>
            @if($filial_sub_weeks->count() != 0)
                <hr>
                <h3>Субфиллиалларнинг қабул бўлимларини {{$week?->week?->name}} йил хафталик хисоботи</h3>
                <table class="table table-responsive f-s-20">
                    <thead>
                    <tr>
                        <th scope="col-1" class="vertical-align">Субфилиал номи</th>
                        <th scope="col" colspan="2" style="background: olivedrab;text-align:center">шундан, яшил зона оркали
                        <th scope="col" colspan="2" style="background: yellow;text-align:center">шундан, сарик зона оркали</th>
                        <th scope="col" colspan="3" style="background: red;text-align:center">шундан, кизил зона оркали</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="text-nowrap" scope="col-1">Субфилиал номи</th>
{{--                        <th class="text-nowrap" scope="col">мурожаат</th>--}}
                        <th class="text-nowrap" scope="col">ёткизилгани</th>
                        <th class="text-nowrap" scope="col">амбулатор</th>
{{--                        <th class="text-nowrap" scope="col">мурожаат</th>--}}
                        <th class="text-nowrap" scope="col">ёткизилгани</th>
                        <th class="text-nowrap" scope="col">амбулатор</th>
{{--                        <th class="text-nowrap" scope="col">мурожаат</th>--}}
                        <th class="text-nowrap" scope="col">ёткизилгани</th>
                        <th class="text-nowrap" scope="col">вафот этгани</th>
                        <th class="text-nowrap" scope="col">мурда акт</th>
                    </tr>

                    @foreach ($filial_sub_weeks as $key => $data)
                        <tr>
                            <td>
                                <pre class="form-control f-s-20">{{ $data?->sub_filial }}</pre>
                            </td>
{{--                            <td><input class="form-control" name="g_appeal[{{$data->id}}]" type="number" min="0"--}}
{{--                                       value="{{$data->g_appeal}}"></td>--}}
                            <td><input class="form-control f-s-20" name="g_sleeping[{{$data->id}}]" type="number" min="0"
                                       value="{{$data->g_sleeping}}"></td>
                            <td><input class="form-control f-s-20" name="g_ambulator[{{$data->id}}]" type="number" min="0"
                                       value="{{$data->g_ambulator}}"></td>
{{--                            <td><input class="form-control f-s-20" name="y_appeal[{{$data->id}}]" type="number" min="0"--}}
{{--                                       value="{{$data->y_appeal}}"></td>--}}
                            <td><input class="form-control f-s-20" name="y_sleeping[{{$data->id}}]" type="number" min="0"
                                       value="{{$data->y_sleeping}}"></td>
                            <td><input class="form-control f-s-20" name="y_ambulator[{{$data->id}}]" type="number" min="0"
                                       value="{{$data->y_ambulator}}"></td>
{{--                            <td><input class="form-control f-s-20" name="r_appeal[{{$data->id}}]" type="number" min="0"--}}
{{--                                       value="{{$data->r_appeal}}"></td>--}}
                            <td><input class="form-control f-s-20" name="r_sleeping[{{$data->id}}]" type="number" min="0"
                                       value="{{$data->r_sleeping}}"></td>
                            <td><input class="form-control f-s-20" name="r_death[{{$data->id}}]" type="number" min="0"
                                       value="{{$data->r_death}}"></td>
                            <td><input class="form-control f-s-20" name="r_dead[{{$data->id}}]" type="number" min="0"
                                       value="{{$data->r_dead}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            @if (auth()->user()->role->id==4 or auth()->user()->role->id==1)
                <button type="submit" name="confirm_status" value="1" class="btn btn-primary fa-pull-right">
                    Тасдиқлаш
                </button>
                <button type="submit" name="confirm_status" value="3" class="btn btn-primary fa-pull-right m-r-5">
                    Қайта кўриб чиқиш учун қайтинг
                </button>
            @else
                <button type="submit" name="confirm_status" value="2" class="btn btn-primary fa-pull-right m-r-5">
                    Тасдиқлаш учун тақдим этиш
                </button>
                <button type="submit" name="confirm_status" value="4" class="btn btn-primary fa-pull-right m-r-5">
                    Ўзингиз учун сақлаш
                </button>
            @endif
        </form>
    </x-panel>
@endsection
