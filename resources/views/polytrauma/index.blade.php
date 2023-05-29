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
                <td class="align-middle">
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="btn btn-link btn-sm sort-btn" data-sort-by="id" data-sort-type="asc">
                            <i class="fas fa-long-arrow-alt-up fa-lg"></i>
                        </button>
                        <button class="btn btn-link btn-sm sort-btn" data-sort-by="id" data-sort-type="desc">
                            <i class="fas fa-long-arrow-alt-down fa-lg"></i>
                        </button>
                    </div>
                </td>
                <td>
                    <select class="form-control form-control-sm" name="department"></select>
                </td>
                <td>
                    <input class="form-control form-control-sm" type="text" name="history_disease">
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
                    <select class="form-control form-control-sm" name="physician_full_name"></select>
                </td>
                <td>
                    <select class="form-control form-control-sm" name="stat_department_full_name"></select>
                </td>
                <td>
                    <button class="btn btn-success btn-block">Применить</button>
                </td>
            </tr>


        </thead>
        <tbody>
            @foreach($data as $key => $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->department}}</td>
                <td>{{$item->history_disease}}</td>
                <td>{{$item->full_name}}</td>
                <td>{{$item->hospitalization_date}}</td>
                <td>{{$item->discharge_date}}</td>
                <td>{{$item->hospitalization_channels}}</td>
                <td>{{$item->physician_full_name}}</td>
                <td>{{$item->stat_department_full_name}}</td>
                <td class="align-middle">
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary btn-xs mr-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-xs mr-1">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-xs mr-1">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>