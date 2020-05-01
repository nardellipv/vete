@extends('layouts.mainAdmin')

@section('breadcrumb', 'Turnos')

@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/datatables_basic.js') }}"></script>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Listado de turnos</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Nombre y Apellido</th>
                <th>Paciente</th>
                <th>Motivo</th>
                <th>Día</th>
                <th>Hora</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($turns as $turn)
                <tr>
                    <th>{{ $turn->customer->name }}</th>
                    <th>{{ $turn->patient->name }}</th>
                    <th>{{ Str::limit($turn->motive, 50) }}</th>
                    <th>{{ \Carbon\Carbon::parse($turn->date)->format('d/m/Y') }}</th>
                    <th>{{ $turn->hours }}</th>
                    <th>
                        <i class="icon-eye"></i>
                        <i class="icon-pencil3"></i>
                        <i class="icon-trash"></i>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection