@php
    $selectedID = null;
    $order = request()->sort;

@endphp


<div class="table-responsive">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">

        <thead>
            <tr>
                <th>№</th>
                <th>Субъект</th>
                <th>Отделение</th>
                <th>Номер ИБ</th>
                <th>Пациент ФИО</th>
                <th>Дата поступления</th>
                <th>Дата выписки</th>
                <th>Канал госпитализации</th>
                <th>ФИО лечащего врача</th>
                {{-- <th>ФИО специалиста стат.отдела</th> --}}
                <th>Действия</th>
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
                        <select class="form-control form-control-sm" name="branch">
                            <option value="" style="font-size: 12px;">Все</option>
                            @foreach ($branches as $id => $name)
                                <option value="{{ $id }}" style="font-size: 12px;"
                                    @if ($id == request('branch')) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select class="form-control form-control-sm" name="department">
                            <option value="" style="font-size: 12px;">Все</option>
                            @foreach ($departments as $id => $name)
                                <option value="{{ $id }}" style="font-size: 12px;"
                                    @if ($id == request('department')) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
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
                        <input class="form-control form-control-sm" name="physician_full_name" value="{{ request('physician_full_name') }}"></input>
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
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->branch->name }}</td>
                    <td>{{ $item->department->name }}</td>
                    <td>{{ $item->history_disease }}</td>
                    <td>{{ $item->full_name }}</td>
                    <td>{{ $item->hospitalization_date }}</td>
                    <td>{{ $item->discharge_date }}</td>
                    <td>{{ $item->hospitalization_channels }}</td>
                    <td>{{ $item->physician_full_name }}</td>
                    {{-- <td>{{ $item->stat_department_full_name }}</td> --}}
                    <td class="align-middle">
                        <div class="d-flex">
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
