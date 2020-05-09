@extends('layouts.mainAdmin')

@section('breadcrumb', 'Stock')

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
            <h5 class="panel-title">Listado Productos</h5>
            <div class="heading-elements">
                <a href="{{ route('showAdd.patient') }}" type="button" class="btn btn-primary btn-xs legitRipple"><i
                            class="icon-heart-broken2 position-left"></i> Agreagar Producto</a>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th>Precio Compra</th>
                <th>Nombre</th>
                <th>Comentario</th>
                <th>Dueño</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $patient)
                <tr>
                    <th>{{ $patient->specie->name }}</th>
                    <th>{{ $patient->race }}</th>
                    <th>{{ \Carbon\Carbon::parse($patient->birthday)->diff(\Carbon\Carbon::now())->format('%y años y %m meses') }}</th>
                    <th>{{ $patient->name }}</th>
                    <th>{{ Str::limit($patient->comment, 50) }}</th>
                    <th>{{ $patient->customer->name }}</th>
                    <th>
                        <ul class="icons-list">
                            <li class="text-primary-600"><a href="{{ route('patient.view', ['slug'=>$patient->slug, 'id'=>$patient->id]) }}"><i class="icon-eye"></i></a></li>
                            <li class="text-teal-600"><a href="{{ route('showEdit.patient', ['slug'=>$patient->slug, 'id'=>$patient->id]) }}"><i class="icon-pencil7"></i></a></li>
                            <form method="POST" action="{{ route('patient.destroy', $patient) }}">
                                @csrf
                                <li class="text-danger-600"><button type="submit" class="btn btn-link legitRipple"><i class="icon-trash"></i></button></li>
                            </form>
                        </ul>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection