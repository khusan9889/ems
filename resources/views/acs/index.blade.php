@php
    $selectedID = null;
@endphp

<div class="table-responsive">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">

        <thead>
            <tr>
                <th>№</th>
                <th>Отделение</th>
                <th>Номер ИБ</th>
                <th>Пациент ФИО</th>
                <th>Дата поступления</th>
                <th>Дата выписки</th>
                <th>Канал госпитализации</th>
                <th>ФИО лечащего врача</th>
                <th>ФИО специалиста стат.отдела</th>
                <th>Действия</th>
            </tr>
            <tr>
                <form action="">
                    <td class="align-middle">
                        <div class="d-flex align-items-center justify-content-center">
                            <button class="btn btn-link btn-sm sort-btn" data-sort-by="id"
                                onclick="toggleSortDirection(this)">
                                <i class="fas fa-sort fa-lg"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <select class="form-control form-control-sm" name="branch">
                            <option value="" style="font-size: 12px;">Выберите отделение</option>
                            @foreach ($branches as $id => $name)
                                <option value="{{ $id }}" style="font-size: 12px;"
                                    @if ($id == request('branch')) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="form-control form-control-sm" type="text" name="history_disease"
                            value="{{ request('history_disease') }}">
                    </td>
                    <td>
                        <input class="form-control form-control-sm" type="text" name="full_name">
                    </td>
                    <td>
                        <input class="form-control form-control-sm" type="text" name="hospitalization_date">
                    </td>
                    <td>
                        <input class="form-control form-control-sm" type="text" name="discharge_date">
                    </td>
                    <td>
                        <select class="form-control form-control-sm" name="hospitalization_channels"></select>
                    </td>
                    <td>
                        <input class="form-control form-control-sm" name="physician_full_name"></select>
                    </td>
                    <td>
                        <input class="form-control form-control-sm" name="stat_department_full_name"></select>
                    </td>
                    <td class="align-middle d-flex justify-content-center">
                        <div>
                            <button type="submit" class="btn btn-primary">Применить</button>
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
                    <td>{{ $item->history_disease }}</td>
                    <td>{{ $item->full_name }}</td>
                    <td>{{ $item->hospitalization_date }}</td>
                    <td>{{ $item->discharge_date }}</td>
                    <td>{{ $item->hospitalization_channels }}</td>
                    <td>{{ $item->physician_full_name }}</td>
                    <td>{{ $item->stat_department_full_name }}</td>
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
@includeWhen($selectedID, 'components.modals.confirmation-modal', ['id' => $selectedID])

<script>
    function confirmDelete(id) {
        $('#deleteConfirmationModal').modal('show');
        $('#deleteForm').attr('action', '/acs/delete/' + id);
    }

    $(document).ready(function() {
        // Add this code to handle the form submission success
        $('#deleteForm').on('submit', function() {
            $('#deleteConfirmationModal').modal('hide');
            history.go(-1); // Redirect back to the previous page
            return true; // Allow the form to submit
        });
    });
</script>
