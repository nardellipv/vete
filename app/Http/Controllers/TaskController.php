<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\AddNewTaskRequest;
use App\Http\Requests\AdvanceSearchDateTaskRequest;
use App\Http\Requests\AdvanceSearchWorlTaskRequest;
use App\Patient;
use App\Task;
use App\Veterinarian;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $tasks = Task::with(['patient', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->where('date', today())
            ->where('status', 'Pendiente')
            ->get();


        $tasksCompleted = Task::with(['patient', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->where('date', today())
            ->where('status', 'Completa')
            ->get();

        return view('panel.task._index', compact('tasks', 'tasksCompleted'));
    }

    public function taskMonth()
    {

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();


        $tasksMonth = Task::with(['patient', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->whereMonth('date', Carbon::now()->month)
            ->get();

        return view('panel.task._monthTask', compact('tasksMonth'));
    }

    public function taskSearchAdvance()
    {
        return view('panel.task._searchAdvanceTask');
    }

    public function searchResultDateTaskAdvance(AdvanceSearchDateTaskRequest $request)
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();


        $from = $request->from;
        $to = $request->to;

        $searchDates = Task::with(['patient', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->whereBetween('date', [$from, $to])
            ->where('status', 'Pendiente')
            ->get();

        $tasksCompleted = Task::with(['patient', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->whereBetween('date', [$from, $to])
            ->where('status', 'Completa')
            ->get();


        return view('panel.task._resultSearchDate', compact('searchDates', 'from', 'to', 'tasksCompleted'));
    }

    public function searchResultWordTaskAdvance(AdvanceSearchWorlTaskRequest $request)
    {

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $searchWords = Task::with(['patient', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->where('title', 'LIKE', '%' . $request->word . '%')
            ->where('status', 'Pendiente')
            ->get();

        $tasksCompleted = Task::with(['patient', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->where('title', 'LIKE', '%' . $request->word . '%')
            ->where('status', 'Completa')
            ->get();


        return view('panel.task._resultSearchWord', compact('searchWords', 'tasksCompleted'));
    }


    public function newTask()
    {

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $customers = Customer::where('veterinarian_id', $veterinarian->id)
            ->get();

        $patients = Patient::where('veterinarian_id', $veterinarian->id)
            ->get();

        return view('panel.task._addTask', compact('customers','patients'));
    }

    public function addNewTask(AddNewTaskRequest $request)
    {

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        Task::create([
            'title' => $request['title'],
            'motive' => $request['motive'],
            'date' => $request['date'],
            'hours' => $request['hours'],
            'priority' => $request['priority'],
            'status' => 'Pendiente',
            'customer_id' => $request['customer_id'],
            'patient_id' => $request['patient_id'],
            'veterinarian_id' => $veterinarian->id,
        ]);

        Toastr::info('Se creó correctamente la tarea', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }
}
