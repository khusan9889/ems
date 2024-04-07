@php
    $selectedID = null;
    $order = request()->sort;
@endphp


<div class="table-responsive">

<form action="">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th  class="text-nowrap">№</th>
                <th  class="text-nowrap">Филиал/Филиал</th>
                <th  class="text-nowrap">Отделение/Бўлим</th>
                <th  class="text-nowrap">Номер истории болезни/Касаллик тарихи рақами</th>
                <th  class="text-nowrap">Пациент ФИО/Беморнинг ФИО</th>
                <th  class="text-nowrap">Дата поступления/Қабул қилиш санаси</th>
                <th  class="text-nowrap">Дата выписки/Чиқариш санаси</th>
                <th  class="text-nowrap">ФИО лечащего врача/Даволовчи шифокорнинг ФИО</th>
                <th  class="text-nowrap">Подтвердите статус/Ҳолатни тасдиқланг</th>
            </tr>
            <tr>
                <td class="align-middle">
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="btn btn-link btn-sm sort-btn" data-sort-by="id"
                            onclick="{{ $order = $order === 'ASC' ? 'DESC' : 'ASC' }}">
                            <i class="fas fa-sort fa-lg"></i>
                        </button>
                        <input type="hidden" name="sort" value="{{ $order }}">
                    </div>
                </td>
                <td><select class="form-control form-control-sm" name="branch" @if (auth()->user()->branch_id != 1) disabled @endif>
                        <option value="" style="font-size: 12px;">Все</option>
                        @foreach ($branches as $id => $name)
                            <option value="{{ $id }}" style="font-size: 12px;"
                                @if ($id == request('branch') || (auth()->user()->branch_id == $id && auth()->user()->branch_id != 1)) selected @endif>{{ $name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="department" value="{{ request('department') }}">
                </td>
                <td>
                    <input class="form-control form-control-sm" type="text" name="history_disease"
                            value="{{ request('history_disease') }}">
                </td>
                <td>
                    <input class="form-control form-control-sm" type="text" name="full_name"
                        value="{{ request('full_name') }}">
                </td>
                <td>
                    <input class="form-control form-control-sm" type="date" name="hospitalization_date"
                        value="{{ request('hospitalization_date') }}">
                </td>
                <td><input class="form-control form-control-sm" type="date" name="discharge_date"
                        value="{{ request('discharge_date') }}"></td>
                <td>
                    <input class="form-control form-control-sm" name="physician_full_name" value="{{ request('physician_full_name') }}"></input>
                </td>
                <td class="align-middle d-flex justify-content-center">
                    <div class="d-flex">
                        <select class="form-control m-r-5" name="confirm_status">
                            <option value="">Все</option>
                            <option value="1" {{ request('confirm_status') == 1? 'selected' : '' }}>Одобрение</option>
                            <option value="2" {{ request('confirm_status') == 2? 'selected' : '' }}>Подача на одобрение</option>
                            <option value="3" {{ request('confirm_status') == 3? 'selected' : '' }}>Возврат на доработку</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary">Применить</button>
                    </div>
                </td>
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
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->branch->name }}</td>
                    <td>{{ $item->department->name }}</td>
                    <td>{{ $item->history_disease }}</td>
                    <td>{{ $item->full_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->hospitalization_date)->format('Y-m-d H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->discharge_date)->format('Y-m-d H:i') }} </td>
                    <td>{{ $item->physician_full_name }}</td>
                    {{-- <td>{{ $item->stat_department_full_name }}</td> --}}
                    <td class="align-middle">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('full-table-polyt', ['id' => $item->id]) }}"
                                class="btn btn-primary btn-xs mr-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if ($item->confirm_status != 1)
                            <a href="{{ route('polyt-edit-page', ['id' => $item->id]) }}"
                                class="btn btn-warning btn-xs mr-1">
                                <i class="fas fa-pen"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-xs mr-1"
                                onclick="{{ $selectedID = $item->id }}; confirmDelete({{ $item->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>

    Записи с {{ ($data->currentpage()-1)*$data->perpage() + ($data->total()==0?0:1)}} по {{($data->currentpage()-1)*$data->perpage() + count($data->items())}} из {{ $data->total() }} записей

</div>

<!-- Pagination -->

<div class="d-flex justify-content-center">
    <div class="float-right">{{$data->withQueryString()->links()}}</div>

</div>
<!-- Confirmation Modal -->
@include('components.modals.confirmation-modal')

@push('scripts')
    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');
            $('#deleteForm').attr('action', `/polytrauma/delete/${id}`);
        }
    </script>
@endpush
