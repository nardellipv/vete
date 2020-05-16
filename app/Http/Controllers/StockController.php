<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddNewStockRequest;
use App\Stock;
use App\Veterinarian;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $stocks = Stock::where('veterinarian_id', $veterinarian->id)
            ->get();

        return view('panel.stock._index', compact('stocks'));
    }

    public function showAddStock()
    {
        $categories = Category::all();

        return view('panel.stock._addStock', compact('categories'));
    }
    
    public function addStock(AddNewStockRequest $request)
    {
        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        Stock::create([
           'name' => $request['name'],
           'provider' => $request['provider'],
           'internalCode' => $request['internalCode'],
           'category_id' => $request['category_id'],
           'buyPrice' => $request['buyPrice'],
           'quantity' => $request['quantity'],
           'expire' => Carbon::parse($request['expire'])->format('Y-m-d'),
            'veterinarian_id' => $veterinarian->id,
        ]);

        Toastr::info('El nuevo producto se creó correctamente', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }
}
