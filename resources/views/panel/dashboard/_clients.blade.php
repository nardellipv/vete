<div class="panel panel-flat panel-collapsed">
    <div class="panel-heading">
        <h5 class="panel-title">Historia Clinica</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>

    <table class="table datatable-basic">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Años</th>
            <th>Comentario</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <th>{{ $patient->name }}</th>
                <th>{{ $patient->specie->name }}</th>
                <th>{{ $patient->race }}</th>
                <th>{{ \Carbon\Carbon::parse($patient->birthday)->diff(\Carbon\Carbon::now())->format('%y años y %m meses') }}</th>
                <th>{{ $patient->comment }}</th>
                <th>
                    <ul class="icons-list">
                        <li class="text-primary-600"><a href="{{ route('patient.view', ['slug'=>$patient->slug, 'id'=>$patient->id]) }}"><i class="icon-heart-broken2"></i></a></li>
                    </ul>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>