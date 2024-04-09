
@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')
    <x-panel title="Юкланган файллар/Загруженные файлы">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger fade show in m-b-15">
                    <strong>Ошибка!</strong>
                    {{__($error)}}
                    <span class="close" data-dismiss="alert">&times;</span>
                </div>
            @endforeach
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h2 class="page-header">Юкланган файллар/Загруженные файлы</h2>
            <div>
                <a href="{{ asset('ambulance_indicators/import_template.xlsx') }}" download="" class="btn btn-success mr-2">Шаблонни юклаб олиш</a>
                <a href="#modal-dialog" class="btn btn-success mr-2" data-toggle="modal">Импорт Excel</a>
            </div>
        </div>

        <!-- #modal-dialog -->

        <div class="modal fade" id="modal-dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Импорт Excel</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form method="POST" action="{{ route('indicator.import') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            @error(' ')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @csrf
                            <label>Вилоятлар/Области</label>
                            <select class="form-control mb-3" name="region_coato"
                                    onchange="myFunction(this.value)">
                                @foreach ($regions as $key => $region)
                                    <option
                                        value="{{ $region->coato }}" {{ request('region_coato') == $region->coato ? 'selected' : '' }}>
                                        {{ $region?->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('region_coato')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label>Вақт оралиғини танланг/Выберите временной интервал</label>
                            <span class="d-flex justify-content-between">
                                <input class="form-control mb-3 mr-2" type="date" name="start_date" required>
                                <input class="form-control mb-3" type="date" name="end_date" required>
                            </span>


                            <span class="btn btn-success file input-button form-control" onclick="handleClick()">
                            <i class="fa fa-upload mr-1"></i>
                            <span onclick="" id="id-x">Выберите файл...</span>
                            <input id="import_file" type="file" style="display:none;" name="import_file" accept=".xls,.xlsx" required>
                        </span>

                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-sm btn-primary">Импорт</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="d-flex">
                <table id="data-table-default" class="table table-striped table-bordered align-middle">
                    <tr>
                        <form action="">
                            <td class="text-nowrap">
                                <label>Вилоятлар</label>
                                <select class="form-control" name="call_region_coato" onchange="myFunction(this.value)">
                                    <option value="">Все</option>
                                    @foreach ($regions as $key => $region)
                                        <option
                                            value="{{ $region->coato }}" {{ request('call_region_coato') == $region->coato ? 'selected' : '' }}>
                                            {{ $region?->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('call_region_coato')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>


                            <td class="text-nowrap">
                                <label>Файл ҳолати</label>
                                <select class="form-control" name="sanction">
                                    <option value="">Все</option>
                                    <option value="2"  {{ request('sanction') == 2 ? 'selected' : '' }}>Хатолик бор</option>
                                    <option value="1"  {{ request('sanction') == 1 ? 'selected' : '' }}>Юкланди</option>
                                    <option value="3"  {{ request('sanction') == 3 ? 'selected' : '' }}>Текширилмоқда</option>
                                </select>

                            </td>
                            <td class="text-nowrap">
                                <label>Бошланиш санаси	</label>
                                <input class="form-control" type="date" name="start_date"
                                       value="{{request('start_date')}}">
                            </td>
                            <td class="text-nowrap">
                                <label>Тугаш санаси</label>
                                <input class="form-control" type="date" name="end_date"
                                       value="{{request('end_date')}}">
                            </td>

                            <td class="text-nowrap">
                                <div class="d-flex justify-content-center mt-4  ">
                                    <button type="submit" class="btn btn-primary">Филтр</button>
                                </div>
                            </td>
                        </form>
                    </tr>

                </table>
            </div>

        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Вилоятлар</th>
                    <th>Бошланиш санаси</th>
                    <th>Тугаш санаси</th>
                    <th>Чақирувлар сони</th>
                    <th class="d-flex justify-content-center">Файл ҳолати</th>
                    <th>Юкланган файллар</th>
                    <th>Яратилган вақт</th>
                    <th>Амаллар</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($indicators as $key => $item)
                    <tr>
                        <td>{{ ($indicators->currentpage()-1)*10 + $loop->index + 1}}</td>
                        <td>{{ $item->region?->name }}</td>
                        <td><b>{{ $item->start_date }}</b></td>
                        <td><b>{{ $item->end_date }}</b></td>
                        <td><b>{{ $item->indicators_count }}</b></td>
                        <td class="d-flex justify-content-center">
                            @if ($item->sanction==1)
                                <div
                                    style="background-color:green; padding-right: 6px; padding-left: 6px;margin: 4px;  border-radius: 3px; color: white;">
                                    <b> Юкланди</b>
                                </div>
                            @else
                                @if ($item->sanction==2)
                                    <div
                                        style="background-color:red; padding-right: 6px; padding-left: 6px;margin: 4px;  border-radius: 3px; color: white;">
                                        <b>Хатолик бор</b>
                                    </div>
                                @else
                                    <div
                                        style="background-color:yellow; padding-right: 6px; padding-left: 6px;margin: 4px;  border-radius: 3px; color: black;">
                                        <b>Текширилмоқда</b>
                                    </div>
                                @endif
                            @endif
                        </td>
                        <td><a href="{{asset($item->file)}}" download="{{$item->start_date}}-{{$item->end_date}}">
                                <b>
                                    {{$item->start_date}}-{{$item->end_date}}</a></td>
                        </b>
                        <td><b>{{ $item->created_at }}</b></td>

                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-danger btn-xs mr-1"
                                        onclick="confirmDelete({{ $item->id }})">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            Записи с {{ ($indicators->currentpage()-1)*$indicators->perpage() + ($indicators->total()==0?0:1)}}
            по {{($indicators->currentpage()-1)*$indicators->perpage() + count($indicators->items())}}
            из {{ $indicators->total() }} записей
        </div>
        </div>
    </x-panel>

    <div class="d-flex justify-content-center">
        <div class="float-right">{{$indicators->withQueryString()->links()}}</div>

    </div>


    @include('components.modals.confirmation-modal')

    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');
            $('#deleteForm').attr('action', `/indicator-file/delete/${id}`);
        }

        document.querySelector("#import_file").onchange = function() {
          const fileName = this.files[0]?.name;
          const label = document.getElementById('id-x');
          label.innerText = fileName ?? "Выберите файл...";
        };

        function handleClick() {
            document.getElementById('import_file').click();
        }


        function myFunction(val) {

        const xhr = new XMLHttpRequest();
        xhr.open("GET", `district_region/${val}`);
        xhr.send();
        xhr.responseType = "json";
        xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {

        var x = document.getElementById("mySelect");
        document.querySelectorAll('#mySelect option').forEach(option => option.remove())
            var option = document.createElement("option");
              option.text = "Все";
              option.value="";
              x.add(option);
            for (const  object in xhr.response) {
              var option = document.createElement("option");
              option.text = xhr.response[object]['name'];
              option.value=xhr.response[object]['coato'];
              x.add(option);
             }
        } else {
        console.log(`Error: ${xhr.status}`);
        }
        };
        }


    </script>
@endsection
