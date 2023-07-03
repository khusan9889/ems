@extends('dashboard.layouts.default')

@php
    $selectedID = null;
    $order = request()->sort;
@endphp

@section('content')
    <h1 class="page-header">Отделения</h1>
    <x-panel>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('department.create-page') }}" class="btn btn-success">Добавить</a>
        </div>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Отделения</th>
                        <th>Субъект</th>
                        <th>Действия</th>
                    </tr>
                    <tr>
                        <form action="">
                            <td class="align-middle">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button class="btn btn-link btn-sm sort-btn" data-sort-by="id"
                                        onclick="{{ $order = $order === 'ASC' ? 'DESC' : 'ASC' }}">
                                        <i class="fas fa-sort fa-lg"></i>
                                    </button>
                                    <input type="hidden" name="sort" value="{{ $order }}">
                                </div>
                            </td>
                            <td>
                                <select class="form-control form-control-sm" name="department">
                                    <option value="" style="font-size: 12px;">Все</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" style="font-size: 12px;"
                                            @if ($department->id == request('department')) selected @endif>{{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-sm" name="branch">
                                    <option value="" style="font-size: 12px;">Все</option>
                                    @foreach ($branches as $id => $name)
                                        <option value="{{ $id }}" style="font-size: 12px;"
                                            @if ($id == request('branch')) selected @endif>{{ $name->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="align-middle d-flex justify-content-center">
                                <div>
                                    <button type="submit" class="btn btn-sm btn-primary">Применить</button>
                                </div>
                            </td>
                        </form>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->branch->name }}</td>
                            <td class="align-middle">
                                <div class="d-flex">
                                    <a href="{{ route('departments.edit', $item->id) }}" class="btn btn-warning btn-xs mr-1">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs mr-1"
                                        onclick="{{ $selectedID = $item->id }}; confirmDelete({{ $item->id }})">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-panel>





    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>

    <!-- Confirmation Modal -->
    @includeWhen($selectedID, 'components.modals.confirmation-modal', ['id' => $selectedID, 'routeName' => 'department.delete'])

    <script>
        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');

        }

        $().ready(function() {
         
        });
    </script>

@endsection


