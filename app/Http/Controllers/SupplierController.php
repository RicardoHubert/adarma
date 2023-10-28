<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Supplier;
// use App\Model\CategoryProduct;
use App\IndonesiaProvince;
use App\Model\LandingPage;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Supplier';
        $supplier = Supplier::get();
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.supplier.index', compact('supplier','landingpage','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Add Supplier';
        $indonesia_province = IndonesiaProvince::get();
        // $category = CategoryProduct::get();
        $landingpage = LandingPage::latest()->first();
        return view('dashboard.supplier.create', compact('landingpage','title','indonesia_province'));
        
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
            'nama_produk' => 'required|string',
            'nama_supplier' => 'required|string',
            // 'negara_tujuan' => 'string|nullable',
            // 'category_id' => 'required|integer',
            // 'dataentry_product_id' => 'required|integer',
            'no_supplier' => 'required|string',
            'kota_supply' => 'required|string',
            'alamat_supplier' => 'required|string',
            'email' => 'required|string|email',
            'requirment_word_file' => 'required|string',
            'tipe_supplier' => 'required|string',
            'price' => 'string|nullable',
            'unit' => 'string|nullable',
            'status_instansi' => 'string|nullable',
            'status_supplier' => 'string|nullable',
            'note' => 'string|nullable',
            // 'status_buyer' => 'string|nullable'
        ]);

        // Mengambil nilai dari input nomor handphone
        $noHandphone = $validated['no_supplier'];
        // Membersihkan nomor handphone dengan ekspresi regulernya
        $noHandphoneCleaned = preg_replace('/[^0-9]/', '', $noHandphone);
        // Menambahkan ekstensi dan nomor handphone yang telah digabungkan ke dalam data yang akan disimpan
        $validated['no_supplier'] = $noHandphoneCleaned;
        
        if($validated != NULL){
            $validated['status_supplier'] = "Data Lengkap";
        }else{
            $validated['status_supplier'] = "Data Tidak Lengkap";
        }

        Supplier::create($validated);
        
        return redirect()->route('supplier.index')->with('success','Data Supplier berhasil dittambahkan');
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
            //
            $supplier = Supplier::find($id);
    
            $supplier->delete();
        
            return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil dihapus!');
    }
}
