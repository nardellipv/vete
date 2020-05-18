@extends('layouts.mainAdmin')

@section('breadcrumb', 'Tareas')


@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_bootstrap_select.js' )}}"></script>
@endsection



@section('css')
    <style>
        /* Removes the clear button from date inputs */
        input[type="date"]::-webkit-clear-button {
            display: none;
        }

        /* Removes the spin button */
        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        /* Always display the drop down caret */
        input[type="date"]::-webkit-calendar-picker-indicator {
            color: #2c3e50;
        }

        /* A few custom styles for date inputs */
        input[type="date"] {
            appearance: none;
            -webkit-appearance: none;
            color: #95a5a6;
            font-family: "Helvetica", arial, sans-serif;
            font-size: 15px;
            border: 1px solid #ecf0f1;
            background: #ecf0f1;
            padding: 6px;
            display: inline-block !important;
            visibility: visible !important;
        }

        input[type="date"], focus {
            color: #95a5a6;
            box-shadow: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
        }
    </style>
@endsection


@section('content')
    <div class="content">

        @include('alerts._errors')
        @include('panel.sale._menuSell')


        <div class="panel panel-flat">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="panel-title">Busqueda por Fecha</h6>
                    </div>
                    <form method="post" action="{{ route('searchResultDateTask.advance') }}">
                        @csrf
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Desde</span>
                                        <input type="date" name="from" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Hasta</span>
                                        <input type="date" name="to" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit"
                                    class="btn btn-primary btn-raised legitRipple">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-flat">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="panel-title">Busqueda por Palabra Clave</h6>
                    </div>
                    <form method="post" action="{{ route('searchResultWordTask.advance') }}">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="word" placeholder="Palabra Clave">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit"
                                    class="btn btn-primary btn-raised legitRipple">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
