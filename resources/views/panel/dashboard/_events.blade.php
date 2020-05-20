<div class="panel panel-white">
    <div class="panel-heading">
        <h6 class="panel-title">Tareas para <b>{{ now()->format('d/m/Y') }}</b></h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>

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
                                <a href="{{route('check.task', $task)}}" type="button"
                                   class="btn bg-teal-600 legitRipple"><i
                                            class="icon-checkmark"></i></a>
                                <a href="{{ route('delete.task', $task) }}" type="button"
                                   class="btn bg-teal-600 legitRipple"><i
                                            class="icon-cross2"></i></a>
                                <div class="btn-group">
                                    <button type="button"
                                            class="btn bg-teal-600 dropdown-toggle legitRipple"
                                            data-toggle="dropdown" aria-expanded="false">
                                        Cambiar Prioridad
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="{{ route('changePriority.task', array($task,'Baja')) }}">Prioridad
                                                Baja</a></li>
                                        <li>
                                            <a href="{{ route('changePriority.task', array($task,'Normal')) }}">Prioridad
                                                Normal</a></li>
                                        <li>
                                            <a href="{{ route('changePriority.task', array($task,'Alta')) }}">Prioridad
                                                Alta</a></li>
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