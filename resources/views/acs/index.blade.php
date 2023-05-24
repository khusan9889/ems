<!-- required files -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Xs4mwd6JczjdTev+ssUJTCqyTh48YC4wx+z0JX9H8duU97R9GnwdcRv7bkP2CCfbwMFw4zxUjcK5K8x/+P/PyA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
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
                    <i class="fas fa-eye"></i> <!-- Eye icon -->
                    <i class="fas fa-pen"></i> <!-- Pen icon -->
                    <i class="fas fa-trash-alt"></i> <!-- Bin icon -->
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>