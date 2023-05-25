<!-- required files -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Xs4mwd6JczjdTev+ssUJTCqyTh48YC4wx+z0JX9H8duU97R9GnwdcRv7bkP2CCfbwMFw4zxUjcK5K8x/+P/PyA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- required files -->
<link href="../assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="../assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<script src="../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

<div class="table-responsive">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">

        <thead>
            <tr>
                <th>id</th>
                <th>department</th>
                <th>history_disease</th>
                <th>full_name</th>
                <th>hospitalization_date</th>
                <th>discharge_date</th>
                <th>hospitalization_channels</th>
                <th>physician_full_name</th>
                <th>stat_department_full_name</th>
                <th>Actions</th> <!-- Empty header for the icon column -->
            </tr>
            <tr>
                <td>
                    <select class="input-group input-group-sm mb-3 form-control" type="text" name="" id="">
                </td>
                <td>
                    <select class="input-group input-group-sm mb-3 form-control" type="text" name="department">
                </td>
                <td>
                    <input class="input-group input-group-sm mb-3 form-control" type="text" name="history_disease">
                </td>
                <td>
                    <input class="input-group input-group-sm mb-3 form-control" type="text" name="full_name">
                </td>
                <td>
                    <input class="input-group input-group-sm mb-3 form-control" type="text" name="hospitalization_date">
                </td>
                <td>
                    <input class="input-group input-group-sm mb-3 form-control" type="text" name="discharge_date">
                </td>
                <td>
                    <select class="input-group input-group-sm mb-3 form-control" type="text" name="hospitalization_channels">
                </td>
                <td>
                    <select class="input-group input-group-sm mb-3 form-control" type="text" name="physician_full_name">
                </td>
                <td>
                    <select class="input-group input-group-sm mb-3 form-control" type="text" name="stat_department_full_name">
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
                <td>
                    <button type="button" class="btn btn-primary btn-xs">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-warning btn-xs">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
  $('#data-table-default').DataTable({
    responsive: true
  });
</script>