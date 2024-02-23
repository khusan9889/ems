@extends('dashboard.layouts.default')

@section('content')
    <h1 class="page-header">Роли</h1>
    <div class="panel panel-inverse">
        <x-panel>
            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Номи</th>
                    <th class="text-right">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td id="name-td-{{ $role->id }}">

                            {{ $role->name }}
                        </td>
                        <td>
                            <a href="{{ route('role.permission', $role->name) }}"
                               class="btn btn-orange btn-xs pull-right  m-r-5 m-b-5 update"
                               data-id="{{ $role->id }}">
                                <i class="fas fa-shield-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-panel>
@endsection
