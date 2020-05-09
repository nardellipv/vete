<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\AdvancedSearchCustomerRequest;
use App\Http\Requests\AdvancedSearchDateRequest;
use App\Http\Requests\AdvanceSearchStatusRequest;
use App\Sale;
use App\Stock;
use App\Veterinarian;
use Carbon\Carbon;
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

        return view('panel.sale._addSale', compact('customers', 'stocks'));
    }
}
