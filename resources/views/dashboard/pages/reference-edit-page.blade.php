@extends('dashboard.layouts.default')
@section('content')


    <x-panel title="Каталогни таҳрирлаш">
        <form method="POST" action="{{ route('reference.update', ['id' => $reference->id]) }}">
            @csrf
            @method('PUT')
            <table class="table table-striped table-bordered align-middle">
                <tbody>
{{--                <tr>--}}
{{--                    <th>№</th>--}}
{{--                    <td>{{ $reference->id }}</td>--}}
{{--                </tr>--}}
                <tr>
                    <th>Турини танланг</th>
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
                        <input type="text" name="name" class="form-control" value="{{ $reference->name }}" required>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary ">Сохранить</button>
            </div>
        </form>

    </x-panel>

@endsection
