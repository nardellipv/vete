<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\Http\Requests\AddNewCustomerRequest;
use App\Http\Requests\EditCustomerRequest;
use App\Province;
use App\User;
use App\Veterinarian;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function index()
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $customers = Customer::with(['city'])
            ->where('veterinarian_id', $veterinarian->id)
            ->get();

        return view('panel.customer._indexCustomer', compact('customers'));
    }

    public function viewCustomer($dni)
    {
        $customer = Customer::where('dni', $dni)
            ->first();

        return view('panel.customer._viewCustomer', compact('customer'));
    }

    public function showAddCustomer()
    {
        $province = Province::where('id', Auth::user()->province_id)
            ->first();

        $cities = City::where('province_id', $province->id)
            ->get();

        return view('panel.customer._addCustomer', compact('cities', 'province'));
    }

    public function addCustomer(AddNewCustomerRequest $request)
    {

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        Customer::create([
            'name' => $request['name'],
            'dni' => $request['dni'],
            'email' => $request['email'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'veterinarian_id' => $veterinarian->id,
            'city_id' => $request['city_id'],
        ]);

        Toastr::info('Se creó correctamente el nuevo cliente', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }


    public function showEditCustomer($dni)
    {
        $customer = Customer::where('dni', $dni)
            ->first();

        $province = Province::where('id', Auth::user()->province_id)
            ->first();

        $cities = City::where('province_id', $province->id)
            ->get();

        return view('panel.customer._editCustomer', compact('customer', 'province', 'cities'));
    }

    public function showUpdateCustomer(EditCustomerRequest $request, $id)
    {

        $customer = Customer::find($id);
        $customer->fill($request->all())->update();


        Toastr::info('Se actualizó correctamente el cliente', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }

    public function destroyCustomer($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        Toastr::warning('Se eliminó el cliente y sus mascotas', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }
}
