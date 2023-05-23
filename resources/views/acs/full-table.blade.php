@extends('dashboard.layouts.default')

@section('title', 'Full Table')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <!-- <li class="breadcrumb-item"><a href="javascript:;">Дашборд</a></li> -->
        <!-- <li class="breadcrumb-item active">Full Table</li> -->
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Full Table</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <x-panel title="ACS List">
        <!-- Filter Form -->
        <form action="{{ route('acs.full-table') }}" method="GET" class="row">
            <div class="form-group col-md-6">
                <label for="department">Department:</label>
                <select name="department" id="department" class="form-control">
                    <option value="">All Departments</option>
                    <option value="Department 1" {{ request('department') == 'Department 1' ? 'selected' : '' }}>Department 1</option>
                    <option value="Department 2" {{ request('department') == 'Department 2' ? 'selected' : '' }}>Department 2</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="search">Search by Name:</label>
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Apply Filters and Search</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Table -->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('acs.acs_list') }}
            </h2>
        </x-slot>
        <style>
            table,
            th,
            td {
                border: 1px solid black;
            }
        </style>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>department</th>
                        <th>history_disease</th>
                        <th>full_name</th>
                        <th>hospitalization_date</th>
                        <th>discharge_date</th>
                        <th>hospitalization_channels</th>
                        <th>treatment_result</th>
                        <th>final_result</th>
                        <th>anginal_attack_date</th>
                        <th>cta_invasive_angiography</th>
                        <th>cta_90min</th>
                        <th>deferred_cta_invasive</th>
                        <th>deferred_cta_completed</th>
                        <th>reasons_not_performing_cta</th>
                        <th>thrombolytic_therapy</th>
                        <th>thrombolytic_therapy_administered</th>
                        <th>not_administering_tlt</th>
                        <th>ecg_during_hospitalization</th>
                        <th>st_segment</th>
                        <th>echocardiogram</th>
                        <th>first_measurement</th>
                        <th>cholestero_levels</th>
                        <th>aptt</th>
                        <th>anticoagulant</th>
                        <th>aspirin</th>
                        <th>p2y12</th>
                        <th>high_intensity_statins</th>
                        <th>ACE_inhibitors_ARBs</th>
                        <th>physician_full_name</th>
                        <th>stat_department_full_name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->department}}</td>
                            <td>{{$item->history_disease}} </td>
                            <td>{{$item->full_name}}</td>
                            <td>{{$item->hospitalization_date}}</td>
                            <td>{{$item->discharge_date}}</td>
                            <td>{{$item->hospitalization_channels}}</td>
                            <td>{{$item->treatment_result}}</td>
                            <td>{{$item->final_result}}</td>
                            <td>{{$item->anginal_attack_date}}</td>
                            <td>{{$item->cta_invasive_angiography}}</td>
                            <td>{{$item->cta_90min}}</td>
                            <td>{{$item->deferred_cta_invasive}}</td>
                            <td>{{$item->deferred_cta_completed}}</td>
                            <td>{{$item->reasons_not_performing_cta}}</td>
                            <td>{{$item->thrombolytic_therapy}}</td>
                            <td>{{$item->thrombolytic_therapy_administered}}</td>
                            <td>{{$item->not_administering_tlt}}</td>
                            <td>{{$item->ecg_during_hospitalization}}</td>
                            <td>{{$item->st_segment}}</td>
                            <td>{{$item->echocardiogram}}</td>
                            <td>{{$item->first_measurement}}</td>
                            <td>{{$item->cholestero_levels}}</td>
                            <td>{{$item->aptt}}</td>
                            <td>{{$item->anticoagulant}}</td>
                            <td>{{$item->aspirin}}</td>
                            <td>{{$item->p2y12}}</td>
                            <td>{{$item->high_intensity_statins}}</td>
                            <td>{{$item->ACE_inhibitors_ARBs}}</td>
                            <td>{{$item->physician_full_name}}</td>
                            <td>{{$item->stat_department_full_name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-panel>
    <!-- end panel -->
@endsection

@section('scripts')
    <script>
        // Check if the department and search parameters are present in the URL
        const department = "{{ request('department') }}";
        const search = "{{ request('search') }}";
        if (department || search) {
            // Hide the eye icon
            const eyeIcon = document.querySelector('.panel-heading-btn .fa-eye');
            if (eyeIcon) {
                eyeIcon.style.display = 'none';
            }
        }
    </script>
@endsection