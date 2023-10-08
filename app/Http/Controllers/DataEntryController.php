<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DataentryProduct;
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
        $title = 'Dataentry';

        $get_product = DataentryProduct::get();
        return view('dashboard.dataentry.index', compact('get_product','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Dataentry';
        return view('dashboard.dataentry.create', compact('title'));
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
}
