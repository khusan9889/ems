@extends('dashboard.layouts.default')
@section('content')

    <x-panel title="Создание новой справочник">
        <form method="POST" action="{{ route('reference.store') }}">
            @csrf
            <table class="table table-striped table-bordered align-middle">
                <tbody>
                    <tr>
                        <th>Выберите Тип</th>
                        <td>
                            <select class="form-control form-control-sm" name="table_name">
                                <option value="Тип вызова" style="font-size: 12px;"
                                        @if ("Тип вызова" == request('table_name')) selected @endif>Тип вызова
                                </option>
                                <option value="Причина вызова" style="font-size: 12px;"
                                        @if ("Причина вызова" == request('table_name')) selected @endif>Причина вызова
                                </option>
                                <option value="Результат выезда" style="font-size: 12px;"
                                        @if ("Результат выезда" == request('table_name')) selected @endif>Результат
                                    выезда
                                </option>
                                <option value="Результат госпитализации" style="font-size: 12px;"
                                        @if ("Результат госпитализации" == request('table_name')) selected @endif>
                                    Результат госпитализации
                                </option>
                                <option value="Кто вызвал" style="font-size: 12px;"
                                        @if ("Кто вызвал" == request('table_name')) selected @endif>Кто вызвал
                                </option>
                                <option value="Место вызова" style="font-size: 12px;"
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
                            <input type="text" name="name" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Номер</th>
                        <td>
                            <input type="number" name="item_id" class="form-control" required>
                        </td>
                    </tr>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary pull-right ">Создать</button>
        </form>
    </x-panel>
@endsection
