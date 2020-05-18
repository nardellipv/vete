@extends('layouts.mainAdmin')

@section('breadcrumb', 'Tareas')

@section('script')
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/invoice_archive.js') }}"></script>
@endsection

@section('content')
    <div class="content">

        @include('panel.task._menuTask')


        <div class="container-detached">
            <div class="content-detached">

                <div class="panel-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs bg-teal-400">
                            <li class="active"><a href="#colored-tab1" data-toggle="tab" class="legitRipple">Tareas
                                    Pendientes</a>
                            </li>
                            <li><a href="#colored-tab2" data-toggle="tab" class="legitRipple">Tareas Completas</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="colored-tab1">

                                <div class="row">
                                    @foreach($tasks as $task)
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

                            <div class="tab-pane" id="colored-tab2">
                                <div class="row">
                                    @foreach($tasksCompleted as $taskCompleted)
                                        <div class="col-md-6">
                                            <div class="panel border-left-lg border-left-primary">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h6 class="no-margin-top"><a
                                                                        href="task_manager_detailed.html">
                                                                    {{ Str::limit($taskCompleted->title,30) }}
                                                                </a></h6>
                                                            <p class="mb-15">{{ Str::limit($taskCompleted->motive, 75) }}</p>
                                                            <li>Estado:
                                                                <span class="label border-left-primary label-striped">{{ $taskCompleted->status }}</span>
                                                            </li>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <ul class="list task-details">
                                                                <li>{{ \Carbon\Carbon::parse($taskCompleted->date)->format('d/m/Y') }}</li>
                                                                <li>{{ \Carbon\Carbon::parse($taskCompleted->hours)->format('H:m') }}</li>
                                                                <li>
                                                                    Prioridad: &nbsp;
                                                                    @if($taskCompleted->priority == 'Alta')
                                                                        <span class="label label-danger label-block">{{ $taskCompleted->priority }}</span>
                                                                    @elseif ($taskCompleted->priority == 'Normal')
                                                                        <span class="label label-warning label-block">{{ $taskCompleted->priority }}</span>
                                                                    @else
                                                                        <span class="label label-info label-block">{{ $taskCompleted->priority }}</span>
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
