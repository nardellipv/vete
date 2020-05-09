@extends('layouts.mainAdmin')

@section('breadcrumb', 'Agregar nueva Ventas')

@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_bootstrap_select.js' )}}"></script>
@endsection


<script>
    function crearDin(){

        var padre = document.getElementById("padre");
        var input = document.createElement("INPUT");
        input.type = 'text';

        padre.appendChild(input);
    }
    window.onload = function(){

        var btnAdd = document.getEmentById("btn_agregar");
        btnAdd.onclick = crearDin;
    }
</script>

@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">

                @include('alerts._errors')

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Agregar un nuevo Cliente</h5>
                    </div>
                    <input type="button" id="btn_agregar" value="+">
                    <form method="post" action="{{ route('addNew.sale') }}">
                        @csrf
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div id="padre" class="input_fields_container_part">
                                    <div class="form-group">
                                        <select class="bootstrap-select" name="stock_id" data-live-search="true"
                                                data-width="100%">
                                            <option value="">Producto</option>
                                            <optgroup label="Stock">
                                                @foreach($stocks as $stock)
                                                    <option value="{{ $stock->id }}">{{ $stock->name }}
                                                        <b>${{ $stock->sellPrice }}</b></option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group form-group-material">
                                    <input type="text" name="quantity" class="form-control" placeholder="Cantidad"
                                           value="{{ old('quantity') }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="quantity" class="form-control" placeholder="Cantidad"
                                           value="{{ old('quantity') }}">
                                </div>

                            </div>

                            <div class="col-md-6">

                            </div>

                            <button type="submit" class="btn btn-primary legitRipple">Agregar
                                Cliente
                            </button>
                            <a href="{{ route('home') }}" type="button" class="btn btn-link legitRipple">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


