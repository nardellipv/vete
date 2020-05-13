<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\AdvancedSearchCustomerRequest;
use App\Http\Requests\AdvancedSearchDateRequest;
use App\Http\Requests\AdvanceSearchStatusRequest;
use App\Sale;
use App\Stock;
use App\Veterinarian;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $sellsDay = Sale::with(['stock', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->where('date', today())
            ->get();

        return view('panel.sale._index', compact('sellsDay'));
    }

    public function sellMonth()
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $sellsMonth = Sale::with(['stock', 'customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->whereMonth('date', Carbon::now('m'))
            ->get();

        return view('panel.sale._monthSell', compact('sellsMonth'));
    }

    public function searchAdvance()
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $customers = Customer::where('veterinarian_id', $veterinarian->id)
            ->get();

        return view('panel.sale._searchAdvanceSale', compact('customers'));
    }

    public function searchResultDateAdvance(AdvancedSearchDateRequest $request)
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();


        $from = $request->from;
        $to = $request->to;

        $searchDates = Sale::with(['customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->whereBetween('date', [$from, $to])
            ->get();


        return view('panel.sale._resultSearchDate', compact('searchDates', 'from', 'to'));
    }

    public function searchResultCustomerAdvance(AdvancedSearchCustomerRequest $request)
    {

        $customers = Sale::with(['customer'])
            ->where('customer_id', $request->customer_id)
            ->get();

        return view('panel.sale._resultSearchCustomer', compact('customers'));
    }

    public function searchResultStatusAdvance(AdvanceSearchStatusRequest $request)
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $searchStatus = Sale::with(['customer'])
            ->where('veterinarian_id', $veterinarian->id)
            ->where('status', $request->status)
            ->get();


        return view('panel.sale._searchAdvanceStatus', compact('searchStatus'));
    }

    public function newSale()
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $customers = Customer::where('veterinarian_id', $veterinarian->id)
            ->get();

        $stocks = Stock::where('veterinarian_id', $veterinarian->id)
            ->get();

        $invoiceNumber = Sale::where('veterinarian_id', $veterinarian->id)
            ->orderBy('invoice', 'DESC')
            ->first();

        return view('panel.sale._addSale', compact('customers', 'stocks', 'veterinarian', 'invoiceNumber'));
    }

    public function addNewSale(Request $request)
    {

        dd($request->all());
//        $data = $request->all();

        $datas = Arr::dot($request->all());
        $cant = count($datas) / 6 - 1;


//        foreach ($datas as $key => $value) {
//            for ($i = 0; $i <= $cant; $i++) {
//                if ($key == 'qty.' . $i) {
//                    print($key = $value->qty);
//                }
//            }
//        }

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();


        foreach ($datas as $key=>$value) {
            for ($i = 0; $i <= $cant; $i++) {

                $sales = new Sale();
                $sales->customer_id = $request['customer_id'];
                $sales->stock_id = $key['2'];
                $sales->comment = 9;
                $sales->quantity = $key = $value[$i];
                $sales->mount = 9;
                $sales->discount = 9;
                $sales->invoice = 92;
                $sales->date = now();
                $sales->status = 'Pagada';
                $sales->veterinarian_id = $veterinarian->id;
                $sales->save();
            }
        }

        Toastr::info('Se creó correctamente el nuevo cliente', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }
}
