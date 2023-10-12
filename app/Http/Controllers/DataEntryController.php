<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DataentryProduct;
use App\Model\DataEntryPaymentTerms;
use App\Model\DataEntryShippingTerms;
use App\Model\LandingPage;
use App\User;


class DataEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'DataEntryProduct';
        $landingpage = LandingPage::latest()->first();
        $get_product = DataentryProduct::get();
        return view('dashboard.dataentry.dataentry_product.index', compact('get_product','title','landingpage'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'AddDataentry';
        return view('dashboard.dataentry.dataentry_product.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = request()->validate([
            'product' => 'required|string',
        ]);

        DataentryProduct::create($validated);

        return redirect()->route('dataentry.index')->with('success', 'Entry Produk berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dataentry = DataentryProduct::find($id);
          
        $dataentry->delete();
    
        return redirect()->route('dataentry.index')->with('success', 'Data Entry Produk berhasil dihapus!');

    }

    public function index_payment(){
        $title = 'DataEntryPayment';
        $landingpage = LandingPage::latest()->first();
        $get_payment_terms = DataEntryPaymentTerms::get();
        return view('dashboard.dataentry.dataentry_payment.index', compact('get_payment_terms','title','landingpage'));
    }

    public function create_payment()
    {
        $title = 'AddDataentryPayment';
        return view('dashboard.dataentry.dataentry_payment.create', compact('title'));
    }
    public function store_payment(Request $request)
    {
        //
        $validated = request()->validate([
            'name_payment' => 'required|string',
        ]);

        DataEntryPaymentTerms::create($validated);

        return redirect()->route('dataentry_payment.index')->with('success', 'Entry Payment berhasil dibuat!');
    }

    public function destroy_payment($id)
    {
        //
        $dataentry = DataEntryPaymentTerms::find($id);
          
        $dataentry->delete();
    
        return redirect()->route('dataentry_payment.index')->with('success', 'Data Entry Payment berhasil dihapus!');

    }

    public function index_shipping(){
        $title = 'DataEntryShipment';
        $landingpage = LandingPage::latest()->first();
        $get_shipping_terms = DataEntryShippingTerms::get();
        return view('dashboard.dataentry.dataentry_shipping.index', compact('get_shipping_terms','title','landingpage'));
    }

    
    public function create_shipping()
    {
        $title = 'AddDataentryShipping';
        return view('dashboard.dataentry.dataentry_shipping.create', compact('title'));
    }

    public function store_shipping(Request $request)
    {
        //
        $validated = request()->validate([
            'name_shipping' => 'required|string',
        ]);

        DataEntryShippingTerms::create($validated);

        return redirect()->route('dataentry_shipping.index')->with('success', 'Entry Shipping berhasil dibuat!');
    }

    
    public function destroy_shipping($id)
    {
        //
        $dataentry = DataEntryShippingTerms::find($id);
          
        $dataentry->delete();
    
        return redirect()->route('dataentry_shipping.index')->with('success', 'Data Entry Shipping berhasil dihapus!');

    }
}
