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
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

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

        $products = $request['products'];

        $customer = Customer::where('id', $request->customer_id)
            ->first();

        $veterinarian = Veterinarian::where('user_id', Auth::user()->id)
            ->first();

        $invoiceSale = Sale::where('veterinarian_id', $veterinarian->id)
            ->orderBy('id', 'DESC')
            ->first();

        if($invoiceSale->invoice == NULL){
            $invoiceNum=1;
        }else {
            $invoiceNum = $invoiceSale->invoice + 1;
        }

        //Genera factura
        $client = new Party([
            'name' => $veterinarian->name,
            'phone' => $veterinarian->phone,
            'address' => $veterinarian->address,
        ]);

        $customer = new Party([
            'name' => $customer->name,
            'phone' => $customer->phone,
        ]);


        foreach ($products as $value) {
            $nameProduct = Stock::where('id', $value['stock_id'])
                ->first();
            $items[] =
                (new InvoiceItem())
                    ->title($nameProduct->name)
                    ->pricePerUnit($value['price'])
                    ->quantity($value['qty'])
                    ->discount($value['discount']);

            $sales = new Sale();
            $sales->customer_id = $request['customer_id'];
            $sales->stock_id = $value['stock_id'];
            $sales->comment = 9;
            $sales->quantity = $value['qty'];
            $sales->mount = $value['price'];
            $sales->discount = $value['discount'];
            $sales->invoice = $invoiceNum;
            $sales->date = now();
            $sales->status = 'Pagada';
            $sales->veterinarian_id = $veterinarian->id;
            $sales->save();
        }

        $notes = [
            'aca van las notas',
            'additional notes',
            'in regards of delivery or something else',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('recibo')
            ->sequence($invoiceNum)
            ->serialNumberFormat('{SEQUENCE}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('d/m/Y')
            ->currencySymbol('$')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('vendor/invoices/sample-logo.png'));
        ///////////////////////////////


        Toastr::info('Se generó correctamente el recibo', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return $invoice->download();
//        return back();

    }
}
