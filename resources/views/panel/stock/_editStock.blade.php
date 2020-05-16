@extends('layouts.mainAdmin')

@section('breadcrumb', 'Agregar Stock')

@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_bootstrap_select.js' )}}"></script>

    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
@endsection


@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">

                @include('alerts._errors')

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Editar Producto</h5>
                    </div>
                    <form method="post" action="{{ route('showUpdate.stock', $stock) }}">
                        @csrf
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div class="form-group form-group-material">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre Producto"
                                           value="{{ $stock->name }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="provider" class="form-control" placeholder="Proveedor"
                                           value="{{ $stock->provider }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="internalCode" class="form-control"
                                           placeholder="Código Interno" value="{{ $stock->internalCode }}">
                                </div>

                                <div class="form-group">
                                    <select class="bootstrap-select" name="category_id" data-live-search="true"
                                            data-width="100%">
                                        <option value="{{$stock->category_id}}"> {{$stock->category->name}} </option>
                                        <option value="">Categoría</option>
                                        <optgroup label="Categoría">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-material">
                                    <input type="text" class="form-control" name="buyPrice" placeholder="Precio Compra"
                                           value="{{ $stock->buyPrice }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="quantity" class="form-control" placeholder="Cantidad"
                                           value="{{ $stock->quantity }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="expire" class="form-control" data-mask="99/99/9999"
                                           value="{{ \Carbon\Carbon::parse($stock->expire)->format('d/m/Y') }}" placeholder="Fecha Vencimiento">
                                    <span class="help-block">99/99/9999</span>
                                </div>
                                <br><br>
                            </div>
                            <button type="submit" class="btn btn-primary legitRipple">Actualizar Producto</button>
                            <a href="{{ route('stock.index') }}" type="button"
                               class="btn btn-link legitRipple">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection