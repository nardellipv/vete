@extends('layouts.mainAdmin')

@section('breadcrumb', 'Agregar Cliente')

@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_bootstrap_select.js' )}}"></script>


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
                    <form method="post" action="{{ route('add.patient') }}">
                        @csrf
                        <div class="panel-body">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <select class="bootstrap-select" name="specie_id" data-live-search="true"
                                            data-width="100%">
                                        <option value="">Especie</option>
                                        <optgroup label="Especie">
                                            @foreach($species as $specie)
                                                <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                                <label class="text-muted">Sexo</label>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" class="styled"
                                               value="Macho" {{ old('sex') == 'Macho' ? 'checked' : '' }}>
                                        Macho
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="sex" class="styled"
                                               value="Hembra" {{ old('sex') == 'Hembra' ? 'checked' : '' }}>
                                        Hembra
                                    </label>
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="race" class="form-control" placeholder="Raza"
                                           value="{{ old('race') }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="chip" class="form-control" placeholder="Chip"
                                           value="{{ old('chip') }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="fur" class="form-control" placeholder="Tipo de Pelaje"
                                           value="{{ old('fur') }}">
                                </div>

                                <div class="form-group form-group-material">
                                    <input type="text" name="weight" class="form-control" placeholder="Peso"
                                           value="{{ old('weight') }}">
                                </div>

                                <label class="text-muted">Actividad</label>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="activity" class="styled"
                                               value="Baja" {{ old('activity') == 'Baja' ? 'checked' : '' }}>
                                        Baja
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="activity" class="styled"
                                               value="Media" {{ old('activity') == 'Media' ? 'checked' : '' }}>
                                        Media
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="activity" class="styled"
                                               value="Alta" {{ old('activity') == 'Alta' ? 'checked' : '' }}>
                                        Alta
                                    </label>
                                </div>

                                <div class="form-group">
                                    <select class="bootstrap-select" name="customer_id" data-live-search="true"
                                            data-width="100%">
                                        <option value="">Cliente</option>
                                        <optgroup label="Cliente">
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}{{ (collect(old('customer_id'))->contains($customer->id)) ? 'selected':'' }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group form-group-material">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre"
                                           value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="birthday" data-mask="99/99/9999"
                                           placeholder="Fecha de nacimiento" value="{{ old('birthday') }}">
                                </div>

                                <label class="text-muted">Convivencia</label>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="connivance" class="styled"
                                               value="Si" {{ old('connivance') == 'Si' ? 'checked' : '' }}>
                                        Si
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="connivance" class="styled"
                                               value="No" {{ old('connivance') == 'No' ? 'checked' : '' }}>
                                        No
                                    </label>
                                </div>

                                <label class="text-muted">Castrado</label>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="castrated" class="styled"
                                               value="Si" {{ old('castrated') == 'Si' ? 'checked' : '' }}>
                                        Si
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="castrated" class="styled"
                                               value="No" {{ old('castrated') == 'No' ? 'checked' : '' }}>
                                        No
                                    </label>
                                </div>

                                <label class="text-muted">Nutrición</label>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="nutrition" class="styled"
                                               value="Natural" {{ old('nutrition') == 'Natural' ? 'checked' : '' }}>
                                        Natural
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="nutrition" class="styled"
                                               value="Balanceado" {{ old('nutrition') == 'Balanceado' ? 'checked' : '' }}>
                                        Balanceado
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="nutrition" class="styled"
                                               value="Ambas" {{ old('nutrition') == 'Ambas' ? 'checked' : '' }}>
                                        Ambas
                                    </label>
                                </div>

                                <div class="form-group">
                                    <select class="bootstrap-select" name="frequency" data-live-search="true"
                                            data-width="100%">
                                        <option value="">Frecuencia de Alimentación</option>
                                        <optgroup label="Frecuencia de Alimentación">
                                            <option value="1"{{ old('frequency') == 1 ? "selected" : "" }}>1</option>
                                            <option value="2{{ old('frequency') == 2 ? "selected" : "" }}">2</option>
                                            <option value="3{{ old('frequency') == 3 ? "selected" : "" }}">3</option>
                                            <option value="4{{ old('frequency') == 4 ? "selected" : "" }}">4</option>
                                            <option value="+4{{ old('frequency') == +4 ? "selected" : "" }}">+4</option>
                                            <option value="Libre{{ old('frequency') == 'Libre' ? "selected" : "" }}">Libre</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group form-group-material">
                                    <textarea rows="4" cols="5" name="comment" class="form-control"
                                              placeholder="Observaciones">{{ old('comment') }}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary legitRipple">Agregar
                                Paciente
                            </button>
                            <a href="{{ route('home') }}" type="button" class="btn btn-link legitRipple">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection