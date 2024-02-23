@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
    $userBranchID = auth()->user()->branch_id;
@endphp

@section('content')
    <h1 class="page-header">Юкланган файллар/Загруженные файлы</h1>
    <x-panel>

        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Вилоятлар</th>
                    <th>Бошланиш санаси</th>
                    <th>Тугаш санаси</th>
                    <th>Чақирувлар сони</th>
                    <th>Юкланган файллар</th>
                    <th>Яратилган вақт</th>
                    <th>Файл ҳолати</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($indicators as $key => $item)
                    <tr>
                        <td>{{ ($indicators->currentpage()-1)*10 + $loop->index + 1}}</td>
                        <td>{{ $item->region->name }}</td>
                        <td><b>{{ $item->start_date }}</b></td>
                        <td><b>{{ $item->end_date }}</b></td>
                        <td><b>{{ $item->indicators_count }}</b></td>
                        <td class="d-flex justify-content-center">@if ($item->sanction==1)
                               <b style="background-color:#2c952c; padding-left: 10px;padding-right: 10px; border-radius: 3px; color: white;"> Юкланди</b>
                            @else
                                @if ($item->sanction==2)
                                    <b style="background-color:red; padding-left: 10px;padding-right: 10px; border-radius: 3px; color: white;">Хатолик бор</b>
                                @else
                                    <b style="background-color:yellow; padding-left: 10px;padding-right: 10px; border-radius: 3px; color: black;">Текширилмоқда</b>
                                @endif
                            @endif
                        </td>
                        <td><a href="{{asset($item->file)}}">
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

    </script>
@endsection
