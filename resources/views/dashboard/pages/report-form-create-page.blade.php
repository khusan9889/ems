@extends('dashboard.layouts.default')
@section('content')

    <x-panel
        title="РШТЁИМ нинг Вилоят филиаллари ва субфиллиалларнинг қабул бўлимларин 08.09.2023-15.09.2023 йил хафталик хисоботи">
        <form method="POST" action="{{ route('sub.store') }}">
            @csrf

            <h3>РШТЁИМ нинг Вилоят филиаллари ва субфиллиалларнинг қабул бўлимларин 08.09.2023-15.09.2023 йил хафталик
                хисоботи</h3>
            <table class="table table-responsive borderless ">
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
                    <td class="col">Модни алмаштириш</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                </tbody>

            </table>

                <div class="row mb-2">
                    <div class="col-2">
                        <label>Жами мурожаатлар:</label>
                        <input type="text" class="form-control" placeholder="Жами мурожаатлар" >
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар:</label>
                        <input type="text" class="form-control" placeholder="Жумладан болалар" >
                    </div>
                    <div class="col-2">
                        <label>Тез ёрдам:</label>
                        <input type="text" class="form-control" placeholder="Тез ёрдам" >
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар:</label>
                        <input type="text" class="form-control" placeholder="Жумладан болалар" >
                    </div>
                    <div class="col-2">
                        <label>Узи келган:</label>
                        <input type="text" class="form-control" placeholder="Узи келган" >
                    </div>
                    <div class="col-2">
                        <label>Жумладан болалар:</label>
                        <input type="text" class="form-control" placeholder="Жумладан болалар" >
                    </div>
                </div>
            <div class="row mb-2">
                <div class="col-2">
                    <label>Йулланма билан келган:</label>
                    <input type="text" class="form-control" placeholder="Йулланма билан келган" >
                </div>
                <div class="col-2">
                    <label>Жумладан болалар:</label>
                    <input type="text" class="form-control" placeholder="Жумладан болалар" >
                </div>
                <div class="col-2">
                    <label>Ётқизилган:</label>
                    <input type="text" class="form-control" placeholder="Ётқизилган" >
                </div>
                <div class="col-2">
                    <label>Жумладан болалар:</label>
                    <input type="text" class="form-control" placeholder="Жумладан болалар" >
                </div>
                <div class="col-2">
                    <label>Операция:</label>
                    <input type="text" class="form-control" placeholder="Операция" >
                </div>
                <div class="col-2">
                    <label>Жумладан болалар:</label>
                    <input type="text" class="form-control" placeholder="Жумладан болалар" >
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2">
                    <label>Юқори технологик операциялар:</label>
                    <input type="text" class="form-control" placeholder="Юқори технологик операциялар" >
                </div>
                <div class="col-2">
                    <label>Жумладан болалар:</label>
                    <input type="text" class="form-control" placeholder="Жумладан болалар" >
                </div>
                <div class="col-2">
                    <label>Умерло:</label>
                    <input type="text" class="form-control" placeholder="Умерло" >
                </div>
                <div class="col-2">
                    <label>Жумладан болалар:</label>
                    <input type="text" class="form-control" placeholder="Жумладан болалар" >
                </div>
                <div class="col-2">
                    <label>Амбулатор:</label>
                    <input type="text" class="form-control" placeholder="Амбулатор" >
                </div>
                <div class="col-2">
                    <label>Жумладан болалар:</label>
                    <input type="text" class="form-control" placeholder="Жумладан болалар" >
                </div>
                <div class="col-2">
                    <label>Амбулатор операциялар:</label>
                    <input type="text" class="form-control" placeholder="Амбулатор операциялар" >
                </div>
                <div class="col-2">
                    <label>Жумладан болалар:</label>
                    <input type="text" class="form-control" placeholder="Жумладан болалар" >
                </div>
            </div>

            <h3>РШТЁИМ нинг Вилоят филиаллари ва субфиллиалларнинг қабул бўлимларин 08.09.2023-15.09.2023 йил хафталик
                хисоботи</h3>
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

                @foreach ($branches as $key => $branch)
                    <tr>
                        <td class="col">{{ $branch->name }}</td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                    </tr>

                </tbody>
                @endforeach

            </table>

            <button type="submit" class="btn btn-primary pull-right">Создать</button>
        </form>
    </x-panel>
@endsection
