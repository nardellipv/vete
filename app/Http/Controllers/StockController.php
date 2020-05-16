<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddNewStockRequest;
use App\Http\Requests\EditStockRequest;
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

    public function viewStock($slug, $id)
    {
        $stock = Stock::where('slug', $slug)
            ->where('id',$id)
            ->first();

        return view('panel.stock._viewStock', compact('stock'));
    }

    public function showEditStock($slug, $id)
    {

        $stock = Stock::where('slug', $slug)
            ->where('id',$id)
            ->first();

        $categories = Category::all();

        return view('panel.stock._editStock', compact('stock', 'categories'));
    }

    public function showUpdateStock(EditStockRequest $request, $id)
    {

        $stock = Stock::find($id);
        $stock->expire = Carbon::parse($request['expire'])->format('Y-m-d');
        $stock->fill($request->except('expire'))->update();


        Toastr::info('Se actualizó correctamente el producto', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
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

    public function destroyStock($id)
    {
        $stock = Stock::find($id);
        $stock->delete();

        Toastr::warning('Se eliminó el producto', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }
}
