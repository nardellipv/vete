@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/core/libraries/jquery_ui/core.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/wizards/form_wizard/form.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/wizards/form_wizard/form_wizard.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/wizard_form.js') }}"></script>


    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_bootstrap_select.js' )}}"></script>

@endsection

<div class="panel panel-white panel-collapsed">
    <div class="panel-heading">
        <h6 class="panel-title">Agregar Cliente y Mascota</h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>

    <form class="form-basic" method="POST" action="{{ route('add.customerPatient') }}">
        @csrf
        <fieldset class="step" id="step1">
            <h6 class="form-wizard-title text-semibold">
                <span class="form-wizard-count">1</span>
                Agregar un nuevo Cliente
                <small class="display-block">Introduzca todos los datos del nuevo cliente</small>
            </h6>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="nameCustomer" class="form-control" placeholder="Nombre y Apellido"
                               value="{{ old('nameCustomer') }}">
                    </div>

                    <div class="form-group">
                        <input type="text" name="dni" class="form-control" placeholder="DNI" value="{{ old('dni') }}">
                    </div>

                    <div class="form-group">
                        <input type="text" name="province" class="form-control"
                               value="{{ $province->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <select name="city_id" data-placeholder="Ciudad" class="select">
                            <option></option>
                            <optgroup label="Ciudad">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Teléfono"
                               value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="EMail"
                               value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                    <textarea rows="4" cols="5" name="address" class="form-control"
                              placeholder="Dirección">{{ old('address') }}</textarea>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="step" id="step2">
            <h6 class="form-wizard-title text-semibold">
                <span class="form-wizard-count">2</span>
                Agregar una nueva Mascota
                <small class="display-block">Introduzca todos los datos de la nueva mascota</small>
            </h6>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="specie_id" data-placeholder="Especie" class="select">
                            <option></option>
                            <optgroup label="Especie">
                                @foreach($species as $specie)
                                    <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

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
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-material">
                            <input type="text" name="namePatient" class="form-control" placeholder="Nombre"
                                   value="{{ old('namePatient') }}">
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
                            <select class="select" name="frequency">
                                <option value="">Frecuencia de Alimentación</option>
                                <optgroup label="Frecuencia de Alimentación">
                                    <option value="1"{{ old('frequency') == 1 ? "selected" : "" }}>1</option>
                                    <option value="2{{ old('frequency') == 2 ? "selected" : "" }}">2</option>
                                    <option value="3{{ old('frequency') == 3 ? "selected" : "" }}">3</option>
                                    <option value="4{{ old('frequency') == 4 ? "selected" : "" }}">4</option>
                                    <option value="+4{{ old('frequency') == +4 ? "selected" : "" }}">+4</option>
                                    <option value="Libre{{ old('frequency') == 'Libre' ? "selected" : "" }}">Libre
                                    </option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="form-group form-group-material">
                                    <textarea rows="2" cols="5" name="comment" class="form-control"
                                              placeholder="Observaciones">{{ old('comment') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="form-wizard-actions">
            <button class="btn btn-default" id="basic-back" type="reset">Back</button>
            <button class="btn btn-info" id="basic-next" type="submit">Next</button>
        </div>
    </form>
</div>