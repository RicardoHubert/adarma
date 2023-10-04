<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LandingPage;
use App\Model\CategoryProduct;
use App\Model\Buyer;
use App\Model\LibraryExt;


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
        $countrycodes = LibraryExt::get();
        return view('dashboard.buyer.create', compact('landingpage','category','title','countrycodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'nama' => 'required|string',
            'negara_tujuan' => 'string|nullable',
            'category_id' => 'required|integer',
            'no_buyer' => 'required|string',
            'email' => 'required|string|email',
            'nama_perusahaan' => 'required|string',
            'alamat_perusahaan' => 'required|string',
            'kebutuhan' => 'string|nullable',
            'payment_terms' => 'string|nullable',
            'shipping_terms' => 'string|nullable',
            'note' => 'string|nullable',
            'status_buyer' => 'string|nullable'
        ]);
    
        // Mengambil nilai dari input ekstensi
        $extSelect = $request->input('ext');
    
        // Mengambil nilai dari input nomor handphone
        $noHandphone = $validated['no_buyer'];
    
        // Membersihkan ekstensi dengan ekspresi regulernya
        // $extCleaned = preg_replace('/[^0-9]/', '', $extSelect);
        $extCleaned = preg_replace('/[^0-9+]/', '',  $extSelect);

        // Membersihkan nomor handphone dengan ekspresi regulernya
        $noHandphoneCleaned = preg_replace('/[^1-9]/', '', $noHandphone);
    
        // Menggabungkan ekstensi yang telah dibersihkan dengan nomor handphone yang telah dibersihkan
        $combinedValue = $extCleaned . ' ' . $noHandphoneCleaned;
    
        // Menambahkan ekstensi dan nomor handphone yang telah digabungkan ke dalam data yang akan disimpan
        $validated['no_buyer'] = $combinedValue;
    
        // Cek logika status buyer sesuai dengan yang Anda inginkan
        if (empty($validated['negara_tujuan'])) {
            $validated['status_buyer'] = 'data buyer mentah';
        } else {
            if (empty($validated['kebutuhan'])) {
                $validated['status_buyer'] = 'data buyer mentah';
            } else {
                if (empty($validated['payment_terms'])) {
                    $validated['status_buyer'] = 'data buyer mentah';
                } else {
                    if (empty($validated['shipping_terms'])) {
                        $validated['status_buyer'] = 'data buyer mentah';
                    } else {
                        $validated['status_buyer'] = 'data buyer LOI';
                    }
                }
            }
        }
    
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
            'negara_tujuan' => 'string|nullable',              
            'no_buyer' => 'required|string',
            'email' => 'required|string|email',
            'nama_perusahaan' => 'required|string',
            'alamat_perusahaan' => 'required|string',
            'kebutuhan' => 'string|nullable',
            'payment_terms' => 'string|nullable',
            'shipping_terms' => 'string|nullable',
            'note' => 'string|nullable',
            'status_buyer' => 'string|nullable'


        ]);
        // Cek apakah negara_tujuan tidak memiliki value
        if (empty($validated['negara_tujuan'])) {
            $validated['status_buyer'] = 'data buyer mentah';
        } else {
            // Jika negara_tujuan memiliki value, periksa kebutuhan
            if (empty($validated['kebutuhan'])) {
                $validated['status_buyer'] = 'data buyer mentah';
            } else {
                // Jika kebutuhan memiliki value, periksa payment_terms
                if (empty($validated['payment_terms'])) {
                    $validated['status_buyer'] = 'data buyer mentah';
                } else {
                    // Jika validated_terms memiliki value, atur status menjadi "data buyer LOI"
                    if (empty($validated['shipping_terms'])) {
                        $validated['status_buyer'] = 'data buyer mentah';
                    } else {
                        $validated['status_buyer'] = 'data buyer LOI';
                    }
                }
            }
        }

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
