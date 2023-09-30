<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LandingPage;
use App\Model\CategoryProduct;
use App\Model\Buyer;


class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Buyer';
        $buyer = Buyer::get();
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.buyer.index', compact('buyer','landingpage','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Add Buyer';
        $category = CategoryProduct::get();
        $landingpage = LandingPage::latest()->first();
        return view('dashboard.buyer.create', compact('landingpage','category','title'));
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
            'category_id' => 'required|integer',
            'nama' => 'required|string',
            'no_buyer' => 'required|string',
            'email' => 'required|string|email',
            'nama_perusahaan' => 'required|string',
            'alamat_perusahaan' => 'required|string',

        ]);

        Buyer::create($validated);

        return redirect()->route('buyer.index')->with('success', 'Data buyer berhasil ditambahkan!');
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
        $title = 'Edit Buyer';
        $landingpage = LandingPage::latest()->first();
        $category = CategoryProduct::get();
        $buyer = Buyer::find($id);
        
        return view('dashboard.buyer.edit', compact('title','category','landingpage', 'buyer'));
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
        $writer = Buyer::find($id);

        $validated = request()->validate([
            'category_id' => 'required|integer',
            'nama' => 'required|string',
            'no_buyer' => 'required|string',
            'email' => 'required|string|email',
            'nama_perusahaan'=> 'required|string',
            'alamat_perusahaan'=> 'required|string'


        ]);

            
        Buyer::find($id)->update($validated);
        
        return redirect()->route('buyer.index')->with('success', 'Data buyer berhasil diperbarui!');

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
        $buyer = Buyer::find($id);
    
        $buyer->delete();
    
        return redirect()->route('buyer.index')->with('success', 'Data buyer berhasil dihapus!');
    }
}
