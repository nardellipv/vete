<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\AddNewPatientRequest;
use App\Http\Requests\EditPatientRequest;
use App\Patient;
use App\Specie;
use App\Veterinarian;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function index()
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $patients = Patient::with(['specie', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->get();

        return view('panel.patient._indexPatient', compact('patients'));
    }


    public function showEditPatient($slug, $id)
    {
        $patient = Patient::where('slug', $slug)
            ->where('id',$id)
            ->first();

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $species = Specie::get();

        $customers = Customer::where('veterinarian_id', $veterinarian->id)
            ->get();

        return view('panel.patient._editPatient', compact('patient','species', 'customers'));
    }

    public function showUpdatePatient(EditPatientRequest $request, $id)
    {
        $date = Carbon::parse($request['birthday'])->format('Y-m-d');

        $patient = Patient::find($id);
        $patient->birthday = $date;
        $patient->fill($request->except('birthday'))->update();


        Toastr::info('Se actualizó correctamente la mascota', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }

    public function viewPatient($slug, $id)
    {

        $patient = Patient::where('slug', $slug)
            ->where('id',$id)
            ->first();

        return view('panel.patient._viewPatient', compact('patient'));
    }

    public function showAddPatient()
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $species = Specie::get();

        $customers = Customer::where('veterinarian_id', $veterinarian->id)
            ->get();

        return view('panel.patient._addPatient', compact('species', 'customers'));
    }

    public function addPatient(AddNewPatientRequest $request)
    {

        $date = Carbon::parse($request['birthday'])->format('Y-m-d');

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        Patient::create([
            'sex' => $request['sex'],
            'race' => $request['race'],
            'chip' => $request['chip'],
            'fur' => $request['fur'],
            'weight' => $request['weight'],
            'name' => $request['name'],
            'birthday' => $date,
            'activity' => $request['activity'],
            'connivance' => $request['connivance'],
            'castrated' => $request['castrated'],
            'nutrition' => $request['nutrition'],
            'frequency' => $request['frequency'],
            'comment' => $request['comment'],
            'slug' => Str::slug($request['name']),
            'specie_id' => $request['specie_id'],
            'customer_id' => $request['customer_id'],
            'veterinarian_id' => $veterinarian->id,
        ]);

        Toastr::info('Se creó correctamente el nuevo paciente', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }

    public function destroyPatient($id)
    {
        $patient = Patient::find($id);
        $patient->delete();

        Toastr::warning('Se eliminó la mascotas', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }
}
