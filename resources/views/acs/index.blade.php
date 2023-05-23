<!-- required files -->
<script src="../assets/plugins/ionicons/dist/ionicons/ionicons.js"></script>
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
                <td><ion-icon name="eye-outline"></ion-icon></td> <!-- Icon column with the eye-outline class -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>