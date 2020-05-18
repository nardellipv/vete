@extends('layouts.mainAdmin')

@section('breadcrumb', 'Tareas')

@section('script')
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/invoice_archive.js') }}"></script>
@endsection

@section('content')
    <div class="content">

        @include('panel.task._menuTask')

        <div class="row">
            @foreach($tasksMonth as $task)
                <div class="col-md-6">
                    <div class="panel border-left-lg border-left-primary">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="no-margin-top"><a
                                                href="task_manager_detailed.html">
                                            {{ Str::limit($task->title,30) }}
                                        </a></h6>
                                    <p class="mb-15">{{ Str::limit($task->motive, 75) }}</p>
                                    <li>Estado:
                                        <span class="label border-left-primary label-striped">{{ $task->status }}</span>
                                    </li>
                                </div>

                                <div class="col-md-4">
                                    <ul class="list task-details">
                                        <li>{{ \Carbon\Carbon::parse($task->date)->format('d/m/Y') }}</li>
                                        <li>{{ \Carbon\Carbon::parse($task->hours)->format('H:m') }}</li>
                                        <li>
                                            Prioridad: &nbsp;
                                            @if($task->priority == 'Alta')
                                                <span class="label label-danger label-block">{{ $task->priority }}</span>
                                            @elseif ($task->priority == 'Normal')
                                                <span class="label label-warning label-block">{{ $task->priority }}</span>
                                            @else
                                                <span class="label label-info label-block">{{ $task->priority }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer panel-footer-condensed">
                            <div class="border-top-primary text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn bg-teal-600 legitRipple"><i
                                                class="icon-checkmark"></i></button>
                                    <button type="button" class="btn bg-teal-600 legitRipple"><i
                                                class="icon-cross2"></i></button>
                                    <div class="btn-group">
                                        <button type="button"
                                                class="btn bg-teal-600 dropdown-toggle legitRipple"
                                                data-toggle="dropdown" aria-expanded="false">
                                            Cambiar Prioridad
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="#">Prioridad Baja</a></li>
                                            <li><a href="#">Prioridad Normal</a></li>
                                            <li><a href="#">Prioridad Alta</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
