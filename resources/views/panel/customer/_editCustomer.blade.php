@extends('layouts.mainAdmin')

@section('breadcrumb', 'Agregar Cliente')

@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_bootstrap_select.js' )}}"></script>
@endsection


@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">

                @include('alerts._errors')

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Agregar un nuevo Cliente</h5>
                    </div>
                    <form method="post" action="{{ route('showUpdate.customer', $customer) }}">
                        @csrf
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div class="form-group form-group-material">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre y Apellido" value="{{ old('name', $customer->name) }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="province" class="form-control"
                                           value="{{ $province->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <select class="bootstrap-select" name="city_id" data-live-search="true"
                                            data-width="100%">
                                        <option value="{{ $customer->city->id }}">{{ $customer->city->name }}</option>
                                        <optgroup label="Ciudad">
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="dni" class="form-control" placeholder="DNI" value="{{ old('dni', $customer->dni) }}">
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-material">
                                    <input type="text" class="form-control" name="phone" placeholder="Teléfono" value="{{ old('phone', $customer->phone) }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="email" name="email" class="form-control" placeholder="EMail" value="{{ old('email', $customer->email) }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <textarea rows="4" cols="5" name="address" class="form-control"
                                              placeholder="Dirección">{{ old('address', $customer->address) }}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary legitRipple">Editar
                                Cliente</button>
                            <a href="{{ route('home') }}" type="button" class="btn btn-link legitRipple">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection