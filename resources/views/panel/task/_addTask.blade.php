@extends('layouts.mainAdmin')

@section('breadcrumb', 'Agregar Cliente')

@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_bootstrap_select.js' )}}"></script>


    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/plugins/pickers/anytime.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/picker_date.js') }}"></script>

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

        <div class="row">
            <div class="col-md-12">

                @include('alerts._errors')

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Agregar un nuevo Cliente</h5>
                    </div>
                    <form method="post" action="{{ route('addNew.task') }}">
                        @csrf
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div class="form-group form-group-material">
                                    <input type="text" name="title" class="form-control" placeholder="Título"
                                           value="{{ old('title') }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <textarea rows="7" cols="5" name="motive" class="form-control"
                                              placeholder="Tarea">{{ old('motive') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6 class="text-muted">Fecha y Hora</h6>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="date" name="date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" name="hours" class="form-control" id="anytime-time" value="00:00">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <select class="bootstrap-select" name="customer_id" data-live-search="true"
                                            data-width="100%">
                                        <option value="">Cliente (opcional)</option>
                                        <optgroup label="Clientes">
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="bootstrap-select" name="patient_id" data-live-search="true"
                                            data-width="100%">
                                        <option value="">Paciente (opcional)</option>
                                        <optgroup label="Paciente">
                                            @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <h6 class="text-muted">Prioridad</h6>
                                    <label class="radio-inline">
                                        <input type="radio" name="priority" class="styled"
                                               value="Alta" {{ old('priority') == 'Alta' ? 'checked' : '' }}>
                                        Alta
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="priority" class="styled"
                                               value="Normal" {{ old('priority') == 'Normal' ? 'checked' : '' }}>
                                        Normal
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="priority" class="styled"
                                               value="Baja" {{ old('priority') == 'Baja' ? 'checked' : '' }}>
                                        Baja
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary legitRipple">Agregar
                                Tarea
                            </button>
                            <a href="{{ route('task.index') }}" type="button" class="btn btn-link legitRipple">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection