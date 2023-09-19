<?php

namespace App\Http\Controllers;

use App\Model\LandingPage;
use App\Model\ProductRequest;
use Illuminate\Http\Request;

class ProductRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Product Request';
    
        $landingpage = LandingPage::latest()->first();
        $product_request = ProductRequest::get();
    
        return view('dashboard.product.request.index', compact('title', 'landingpage', 'product_request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Show Product Request';
    
        $landingpage = LandingPage::latest()->first();
        $product_request = ProductRequest::find($id);
    
        return view('dashboard.product.request.show', compact('title', 'landingpage', 'product_request'));
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
        $product_request = ProductRequest::find($id);
        $validated = request()->validate([
            'status' => 'required|string'
        ]);

        ProductRequest::where('id', $product_request->id)->update($validated);

        return redirect()->route('product.request.index')->with('success', 'Permintaan produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_request = ProductRequest::find($id);
        $product_request->delete();

        return redirect()->route('product.request.index')->with('success', 'Permintaan produk berhasil dihapus!');
    }
}
