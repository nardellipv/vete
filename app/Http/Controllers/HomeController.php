<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\Http\Requests\AddCustomerPatientDashboardRequest;
use App\Patient;
use App\Province;
use App\Specie;
use App\Veterinarian;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $province = Province::where('id', Auth::user()->province_id)
            ->first();

        $cities = City::where('province_id', $province->id)
            ->get();

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $species = Specie::get();

        $customers = Customer::where('veterinarian_id', $veterinarian->id)
            ->get();

        $patients = Patient::where('veterinarian_id', $veterinarian->id)
            ->get();

        $countPatient = Patient::where('veterinarian_id', $veterinarian->id)
            ->count();

        $countCustomer = Customer::where('veterinarian_id', $veterinarian->id)
            ->count();

        return view('panel.index', compact('province', 'cities', 'species', 'customers', 'patients',
            'countPatient', 'countCustomer'));
    }

    public function addCustomerPatient(AddCustomerPatientDashboardRequest $request)
    {

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $customer = Customer::create([
            'name' => $request['nameCustomer'],
            'dni' => $request['dni'],
            'email' => $request['email'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'veterinarian_id' => $veterinarian->id,
            'city_id' => $request['city_id'],
        ]);


        $date = Carbon::parse($request['birthday'])->format('Y-m-d');

        Patient::create([
            'sex' => $request['sex'],
            'race' => $request['race'],
            'chip' => $request['chip'],
            'fur' => $request['fur'],
            'weight' => $request['weight'],
            'name' => $request['namePatient'],
            'birthday' => $date,
            'activity' => $request['activity'],
            'connivance' => $request['connivance'],
            'castrated' => $request['castrated'],
            'nutrition' => $request['nutrition'],
            'frequency' => $request['frequency'],
            'comment' => $request['comment'],
            'slug' => Str::slug($request['name']),
            'specie_id' => $request['specie_id'],
            'customer_id' => $customer->id,
            'veterinarian_id' => $veterinarian->id,
        ]);

        Toastr::info('Se crearon correctamente el Cliente y su Mascota', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }
}
