@php
    $selectedID = null;
    $order = request()->sort;

@endphp

<div class="table-responsive">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">

        <thead>
            <tr>
                <th  class="text-nowrap">№</th>
                <th  class="text-nowrap">Субъект/Filial</th>
                <th  class="text-nowrap">Отделение/Bo'lim</th>
                <th  class="text-nowrap">Номер истории болезни/Kasallik tarixi raqami	</th>
                <th  class="text-nowrap">Пациент ФИО/Bemorning FIO</th>
                <th  class="text-nowrap">Дата поступления/Qabul qilish sanasi</th>
                <th  class="text-nowrap">Дата выписки/Chiqarish sanasi</th>
                <th  class="text-nowrap">Канал госпитализации/Olib kelingan usuli</th>
                <th  class="text-nowrap">ФИО лечащего врача/Davolovchi shifokorning FIO</th>
                <th  class="text-nowrap">Подтвердите статус/Holatni tasdiqlang</th>
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
                        <select class="form-control form-control-sm" name="branch"
                            @if (auth()->user()->branch_id != 1) disabled @endif>
                            <option value="" style="font-size: 12px;">Все</option>
                            @foreach ($branches as $id => $name)
                                <option value="{{ $id }}" style="font-size: 12px;"
                                    @if ($id == request('branch') || (auth()->user()->branch_id == $id && auth()->user()->branch_id != 1)) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="department"
                            value="{{ request('department') }}">
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
                        <input class="form-control form-control-sm" type="text" name="hospitalization_date"
                            value="{{ request('hospitalization_date') }}">
                    </td>
                    <td>
                        <input class="form-control form-control-sm" type="text" name="discharge_date"
                            value="{{ request('discharge_date') }}">
                    </td>
                    <td>
                        <select class="form-control form-control-sm" name="hospitalization_channels">
                            <option value="">Все</option> <!-- Add an option for selecting all channels -->
                            @foreach ($hospitalization_channels as $key => $value)
                                <option value="{{ $key }}" @if ($key == request('hospitalization_channels')) selected @endif>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="form-control form-control-sm" name="physician_full_name"
                            value="{{ request('physician_full_name') }}">
                    </td>

                    <td class="align-middle">
                        <div class="d-flex justify-content-center">
                            <select class="form-control m-r-5" name="confirm_status">
                                <option value="">Все</option>
                                <option value="1" {{ request('confirm_status') == 1? 'selected' : '' }}>Одобрение</option>
                                <option value="2" {{ request('confirm_status') == 2? 'selected' : '' }}>Подача на одобрение</option>
                                <option value="3" {{ request('confirm_status') == 3? 'selected' : '' }}>Возврат на доработку</option>
                            </select>
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
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->branch?->name }}</td>
                    <td>{{ $item->department?->name }}</td>
                    <td>{{ $item->history_disease }}</td>
                    <td>{{ $item->full_name }}</td>
                    <td>{{ $item->hospitalization_date }}</td>
                    <td>{{ $item->discharge_date }}</td>
                    <td>{{ $item->hospitalization_channels }}</td>
                    <td>{{ $item->physician_full_name }}</td>
                    {{-- <td>{{ $item->stat_department_full_name }}</td> --}}
                    <td class="align-middle">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('full-table', ['id' => $item->id]) }}"
                                class="btn btn-primary btn-xs mr-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('edit-page', ['id' => $item->id]) }}"
                                class="btn btn-warning btn-xs mr-1">
                                <i class="fas fa-pen"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-xs mr-1"
                                onclick="{{ $selectedID = $item->id }}; confirmDelete({{ $item->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>


<!-- Pagination -->
<div class="d-flex justify-content-center">
    {{ $data->links() }}
</div>

<!-- Confirmation Modal -->
@include('components.modals.confirmation-modal')
{{-- @includeWhen($selectedID, 'components.modals.confirmation-modal', ['id' => $selectedID, 'routeName' => 'acs.delete']) --}}

<script>
    function confirmDelete(id) {
        $('#deleteConfirmationModal').modal('show');
        $('#deleteForm').attr('action', `/acs/delete/${id}`);
    }
</script>
