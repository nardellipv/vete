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
                <a href="{{ route('showAdd.stock') }}" type="button" class="btn btn-primary btn-xs legitRipple"><i
                            class="icon-box-add position-left"></i> Agreagar Producto</a>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th>Precio Compra</th>
                <th>Cantidad</th>
                <th>Vencimiento</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <th>{{ $stock->name }}</th>
                    <th>{{ $stock->provider }}</th>
                    <th>${{ $stock->buyPrice }}</th>
                    @if($stock->quantity <= 20)
                       <th><span class="label label-flat label-block border-info text-danger-600">{{ $stock->quantity }}</span></th>
                    @else
                        <th>{{ $stock->quantity }}</th>
                    @endif
                    @if(now() >= $stock->expire)
                        <th>
                            <span class="label label-danger label-block">{{ \Carbon\Carbon::parse($stock->expire)->format(('d/m/Y')) }}</span>
                        </th>
                    @else
                        <th>{{ \Carbon\Carbon::parse($stock->expire)->format(('d/m/Y')) }}</th>
                    @endif
                    <th>
                        <ul class="icons-list">
                             <li class="text-primary-600"><a href="{{ route('stock.view', ['slug'=>$stock->slug, 'id'=>$stock->id]) }}"><i class="icon-eye"></i></a></li>
                             <li class="text-teal-600"><a href="{{ route('showEdit.stock', ['slug'=>$stock->slug, 'id'=>$stock->id]) }}"><i class="icon-pencil7"></i></a></li>
                             <form method="POST" action="{{ route('stock.destroy', $stock) }}">
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