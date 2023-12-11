@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')

    <ol class="breadcrumb float-xl-end pull-right">
        <li class="breadcrumb-item active">Еженедельные отчеты/Haftalik hisobotlar</li>
        <li class="breadcrumb-item active">Отчеты</li>
    </ol>
    <h1 class="page-header">Отчеты/Hisobotlar</h1>
    <x-panel>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>ИД</th>
                    <th>Филиал/Filial</th>
                    <th>Неделя/Hafta</th>
                    <th>Статус/Status</th>
                    <th>Действия/Harakatlar</th>
                </tr>
                <tr>
                    <form action="">
                        <td class="align-middle">
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-link btn-sm sort-btn" data-sort-by="id"
                                        onclick="{{ $order = $order === 'ASC' ? 'DESC' : 'ASC' }}">
                                    <i class="fas fa-sort fa-lg"></i>
                                </button>
                                <input type="hidden" name="sort" value="{{ $order }}">
                            </div>
                        </td>
                        <td>
                            <select class="form-control form-control-sm" name="branch"  @if (auth()->user()->branch_id != 1) disabled @endif>
                                <option value="" style="font-size: 12px;">Все</option>
                                @foreach ($branches as $id => $name)
                                    <option value="{{ $id }}" style="font-size: 12px;"
                                            @if ($id == request('branch') || (auth()->user()->branch_id == $id && auth()->user()->branch_id != 1))
                                                selected
                                        @endif>{{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">

                                <input class="form-control form-control-sm  w-25 mr-1"  type="month" id="month" onchange="myFunction(this.value)">

                                <select class="form-control form-control-sm w-75 " name="week" id="mySelect">
                                    <option value="" style="font-size: 12px;">Все</option>
                                    @foreach ($weeks as $id => $week)
                                        <option value="{{ $id }}" style="font-size: 12px;"
                                            @if ($id == request('week'))
                                                    selected
                                            @endif
                                        >{{ $week }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </td>
                        <td>
                            <select class="form-control form-control-sm" name="status">
                                <option value="" style="font-size: 12px;">Все</option>
                                <option value="Измененный"
                                        @if ('Измененный' == request('status')))
                                            selected
                                        @endif
                                        style="font-size: 12px;">Измененный</option>
                                <option value="Не изменилось"
                                        @if ('Не изменилось' == request('status')))
                                        selected
                                        @endif
                                        style="font-size: 12px;">Не изменилось</option>
                            </select>
                        </td>
                        <td class="align-middle d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary">Применить</button>
                            </div>
                        </td>
                    </form>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $key => $item)
                    <tr
                        @if ($item->confirm_status == 3)
                            class="table-danger"
                        @endif

                        @if ($item->confirm_status == 2)
                            class="table-warning"
                        @endif

                        @if ($item->confirm_status == 1)
                            class="table-success"
                        @endif
                    >
                        <td>{{ $item->id }} {{$item->confirm_status}}</td>
                        <td>{{ $item->branch->name }}</td>
                        <td>{{ $item->week->name }}</td>
                        <td @if ($item->status=="Не изменилось")
                                style="color: red"
                            @else
                                style="color: green"
                            @endif
                        >{{ $item->status }}</td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('form.edit', $item->id) }}"
                                   class="btn btn-primary btn-xs mr-1">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('form.show', $item->id) }}"
                                   class="btn btn-primary btn-xs mr-1">
                                    <i class="fas fa-eye"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            Записи с {{ ($data->currentpage()-1)*$data->perpage() + ($data->total()==0?0:1)}} по {{($data->currentpage()-1)*$data->perpage() + count($data->items())}} из {{ $data->total() }} записей

        </div>
    </x-panel>

    <div class="d-flex justify-content-center">
        <div class="float-right">{{$data->withQueryString()->links()}}</div>

    </div>
    <script>
        function myFunction(val) {

        const xhr = new XMLHttpRequest();
        xhr.open("GET", `week_data/${val}`);
        xhr.send();
        xhr.responseType = "json";
        xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
        var x = document.getElementById("mySelect");
        document.querySelectorAll('#mySelect option').forEach(option => option.remove())
            for (const  object in xhr.response) {
              var option = document.createElement("option");
              option.text = xhr.response[object];
              option.value=object;
              x.add(option);
             }
             console.log(x)
        } else {
        console.log(`Error: ${xhr.status}`);
        }
        };
        }



    </script>

@endsection
