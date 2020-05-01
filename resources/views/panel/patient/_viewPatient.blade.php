@extends('layouts.mainAdmin')

@section('breadcrumb', 'Agregar Cliente')

@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_bootstrap_select.js' )}}"></script>


    {{--<script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>--}}
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/styling/switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_checkboxes_radios.js') }}"></script>
@endsection


@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">

                @include('alerts._errors')

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Agregar un nuevo Paciente</h5>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">

                            <label class="text-muted">Especie</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->specie->name }}" readonly>
                            </div>

                            <label class="text-muted">Sexo</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->sex }}" readonly>
                            </div>

                            <label class="text-muted">Raza</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->race }}" readonly>
                            </div>

                            <label class="text-muted">Chip</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->chip }}" readonly>
                            </div>

                            <label class="text-muted">Pelaje</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->fur }}" readonly>
                            </div>

                            <label class="text-muted">Peso</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->weight }}" readonly>
                            </div>

                            <label class="text-muted">Actividad</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->activity }}" readonly>
                            </div>

                            <label class="text-muted">Dueño</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->customer->name }}" readonly>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted">Nombre</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->name }}" readonly>
                            </div>

                            <label class="text-muted">Cumpleaños</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ \Carbon\Carbon::parse($patient->birthday)->format('d/m/Y') }} - Edad: {{ \Carbon\Carbon::parse($patient->birthday)->diff(\Carbon\Carbon::now())->format('%y años y %m meses') }}"
                                       readonly>
                            </div>

                            <label class="text-muted">Convivencia</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->connivance }}" readonly>
                            </div>

                            <label class="text-muted">Castrado</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->castrated }}" readonly>
                            </div>

                            <label class="text-muted">Nutrición</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->nutrition }}" readonly>
                            </div>

                            <label class="text-muted">Frecuencia Alimentación</label>
                            <div class="form-group form-group-material">
                                <input type="text" class="form-control"
                                       value="{{ $patient->frequency }}" readonly>
                            </div>

                            <label class="text-muted">Comentario</label>
                            <div class="form-group form-group-material">
                                    <textarea rows="6" cols="5" name="comment" class="form-control"
                                              placeholder="Observaciones">{{ $patient->comment }}</textarea>
                            </div>
                        </div>

                        <a href="{{ route('patient.index') }}" type="button" class="btn btn-link legitRipple">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection