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
                    <form method="post" action="{{ route('add.customer') }}">
                        @csrf
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div class="form-group form-group-material">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre y Apellido"
                                           value="{{ $customer->name }}" readonly>
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="dni" class="form-control" value="{{ $customer->dni }}" readonly>
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="province" class="form-control"
                                           value="{{ $customer->city->name }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-material">
                                    <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}" readonly>
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="email" name="email" class="form-control"
                                           value="{{ $customer->email }}" readonly>
                                </div>

                                <div class="form-group form-group-material">
                                    <textarea rows="4" cols="5" name="address"
                                              class="form-control" readonly>{{ $customer->address }}</textarea>
                                </div>
                            </div>

                            <a href="{{ route('customer.index') }}" type="button" class="btn btn-link legitRipple">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection