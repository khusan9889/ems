
@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Янги каталог яратиш">
@php phpinfo() @endphp
        <form method="POST" action="{{ route('reference.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                    <tr>
                        <th>Турини танланг</th>
                        <td>
                            <select class="form-control form-control-sm" name="table_name">
                                <option value="call_types" style="font-size: 12px;"
                                        @if ("Тип вызова" == request('table_name')) selected @endif>Тип вызова
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
                                <option value="diagnoses" style="font-size: 12px;"
                                        @if ("Диагноз" == request('table_name')) selected @endif>Диагноз
                                </option>
                            </select>
                            @error('table_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Номи</th>
                        <td>
                            <input type="text" name="name" class="form-control" required>
                        </td>
                    </tr>


                </tbody>
            </table>
            <button type="submit" class="btn btn-primary pull-right ">Сақлаш</button>
        </form>
    </x-panel>
@endsection
