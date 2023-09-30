<?php

namespace App\Http\Controllers;

use App\Model\CategoryProduct;
use App\Model\LandingPage;
use App\Model\Product;
use App\Model\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Product';

        $product = Product::latest()->get();
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.product.index', compact('landingpage', 'product', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Product';

        $category = CategoryProduct::get();
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.product.create', compact('landingpage', 'category', 'title'));
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
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'slug' => 'required|string|unique:products,slug',
            'price' => 'required|string',
            'unit' => 'required|string',
            'status' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:1024',
            'product_pdf' => 'nullable|file|mimes:pdf|max:8192',
        ]);
    
        if ($request->hasFile('product_pdf')) {
            $pdfFile = $request->file('product_pdf');
            $originalPdfName = $pdfFile->getClientOriginalName(); // Get the original name
    
            // Save the original name to the database
            $validated['original_pdf_name'] = $originalPdfName;
    
            $pdfFileName = $pdfFile->store('product_pdfs'); // Adjust the storage folder as needed
            $validated['product_pdf'] = $pdfFileName;
        }
    
        $validated['image'] = $request->file('image')->store('product');
        $validated['slug'] = str_replace(' ', '-', strtolower($validated['slug']));
        $validated['slug'] = preg_replace("/[^a-zA-Z0-9-]/", "", $validated['slug']);
    
        Product::create($validated);
    
        return redirect()->route('product.index')->with('success', 'Produk berhasil dibuat!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Show Product';

        $product = Product::find($id);
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.product.show', compact('landingpage', 'product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Product';

        $category = CategoryProduct::get();
        $product = Product::find($id);
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.product.edit', compact('landingpage', 'category', 'product', 'title'));
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
        $product = Product::find($id);

        if ($request->slug !== $product->slug) {
            $validated = request()->validate([
                'name' => 'required|string',
                'category_id' => 'required|integer',
                'slug' => 'required|string|unique:products,slug',
                'price' => 'required|string',
                'unit' => 'required|string',
                'status' => 'required|string',
                'description' => 'required|string',
                'image' => 'file|image|mimes:jpeg,jpg,png,gif|max:1024',
                'product_pdf' => 'nullable|file|mimes:pdf|max:8192',
            ]);
        } else {
            $validated = request()->validate([
                'name' => 'required|string',
                'category_id' => 'required|integer',
                'slug' => 'required|string',
                'price' => 'required|string',
                'unit' => 'required|string',
                'status' => 'required|string',
                'description' => 'required|string',
                'image' => 'file|image|mimes:jpeg,jpg,png,gif|max:1024',
                'product_pdf' => 'nullable|file|mimes:pdf|max:8192',
            ]);
        }

        if ($request->file('image')) {
            // Store the new image
            $validated['image'] = $request->file('image')->store('product');

            // Check if the old image file exists before attempting to delete it
            if (Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
        }

        // Update the product_pdf if a new file is provided
        if ($request->hasFile('product_pdf')) {
            $pdfFile = $request->file('product_pdf');
            $pdfFileName = $pdfFile->store('product_pdfs');
            $validated['product_pdf'] = $pdfFileName;

            // Check if the old product_pdf file exists before attempting to delete it
            if ($product->product_pdf && Storage::disk('public')->exists($product->product_pdf)) {
                Storage::disk('public')->delete($product->product_pdf);
            }
        }

        $validated['slug'] = str_replace(' ', '-', strtolower($validated['slug']));
        $validated['slug'] = preg_replace("/[^a-zA-Z0-9-]/", "", $validated['slug']);

        Product::where('id', $product->id)->update($validated);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
    
        // Delete the image file
        if (file_exists(public_path('storage/' . $product->image))) {
            unlink(public_path('storage/' . $product->image));
        }
    
        // Delete the product_pdf file if it exists
        if ($product->product_pdf && Storage::disk('public')->exists($product->product_pdf)) {
            Storage::disk('public')->delete($product->product_pdf);
        }
    
        $product->delete();
    
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }
    
}
