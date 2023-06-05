@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">ОКС-детальная таблица</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Форма {{$data->id}}</h5>
                    <form method="POST" action="{{ route('update-data', ['id' => $data->id]) }}">
                        @csrf
                        @method('PUT')
                        
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
                                <tr>
                                    <th>id</th>
                                    <td>{{$data->id}}</td>
                                </tr>
                                <tr>
                                    <th>Отделение</th>
                                    <td>
                                        <input type="text" name="department" value="{{$data->department}}">
                                    </td>
                                </tr>
                                <!-- Add more rows for other columns -->
                                <tr>
                                    <th>Исход лечения</th>
                                    <td>
                                        <input type="text" name="treatment_result" value="{{$data->treatment_result}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Исход</th>
                                    <td>
                                        <input type="text" name="final_result" value="{{$data->final_result}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Срок ангинального приступа при поступлении</th>
                                    <td>
                                        <input type="text" name="anginal_attack_date" value="{{$data->anginal_attack_date}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Показана экстренная ЧКВ/инвазивная ангиография?</th>
                                    <td>
                                        <input type="radio" name="cta_invasive_angiography" value="Yes" {{$data->cta_invasive_angiography == 'Yes' ? 'checked' : ''}}> Yes
                                        <input type="radio" name="cta_invasive_angiography" value="No" {{$data->cta_invasive_angiography == 'No' ? 'checked' : ''}}> No
                                    </td>
                                </tr>
                                <!-- Add more rows for radio questions -->
                                <tr>
                                    <th>ФИО лечащего врача</th>
                                    <td>
                                        <input type="text" name="physician_full_name" value="{{$data->physician_full_name}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>ФИО специалиста стат.отдела</th>
                                    <td>
                                        <input type="text" name="stat_department_full_name" value="{{$data->stat_department_full_name}}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
