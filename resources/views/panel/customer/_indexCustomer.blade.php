@extends('layouts.mainAdmin')

@section('breadcrumb', 'Clientes')

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
            <h5 class="panel-title">Listado Clientes</h5>
            <div class="heading-elements">
                <a href="{{ route('showAdd.customer') }}" type="button" class="btn btn-primary btn-xs legitRipple"><i
                            class="icon-users position-left"></i> Agreagar Cliente</a>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Nombre y Apellido</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>email</th>
                <th>Teléfono</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <th>{{ $customer->name }}</th>
                    <th>{{ Str::limit($customer->address, 25) }}</th>
                    <th>{{ $customer->city->name }}</th>
                    <th>{{ $customer->email }}</th>
                    <th>{{ $customer->phone }}</th>
                    <th>
                        <ul class="icons-list">
                            <li class="text-primary-600"><a href="{{ route('customer.view', $customer->dni) }}"><i class="icon-eye"></i></a></li>
                            <li class="text-teal-600"><a href="{{ route('showEdit.customer', $customer->dni) }}"><i class="icon-pencil7"></i></a></li>
                            <form method="POST" action="{{ route('customer.destroy', $customer) }}">
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