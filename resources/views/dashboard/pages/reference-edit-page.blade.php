@extends('dashboard.layouts.default')
@section('content')

    <h1 class="page-header">Редактировать справочник</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ url('/reference') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('reference.update', ['id' => $reference->id]) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
                            <tr>
                                <th>№</th>
                                <td>{{ $reference->id }}</td>
                            </tr>
                            <tr>
                                <th>Выберите тип</th>
                                <td>
                                    <select class="form-control form-control-sm" name="table_name">
                                        <option value="Тип вызова" style="font-size: 12px;"
                                                @if ("call_types" == request('table_name')) selected @endif>Тип вызова
                                        </option>
                                        <option value="reasons" style="font-size: 12px;"
                                                @if ("Причина вызова" == request('table_name')) selected @endif>Причина вызова
                                        </option>
                                        <option value="call_results" style="font-size: 12px;"
                                                @if ("Результат выезда" == request('table_name')) selected @endif>Результат
                                            выезда
                                        </option>
                                        <option value="hospitalization_results" style="font-size: 12px;"
                                                @if ("Результат госпитализации" == request('table_name')) selected @endif>
                                            Результат госпитализации
                                        </option>
                                        <option value="called_persons" style="font-size: 12px;"
                                                @if ("Кто вызвал" == request('table_name')) selected @endif>Кто вызвал
                                        </option>
                                        <option value="call_places" style="font-size: 12px;"
                                                @if ("Место вызова" == request('table_name')) selected @endif>Место вызова
                                        </option>
                                    </select>
                                    @error('table_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Название</th>
                                <td>
                                    <input type="text" name="name" class="form-control" value="{{ $reference->name }}" required>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary ">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
