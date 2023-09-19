<?php

namespace App\Http\Controllers;

use App\Model\CategoryProduct;
use App\Model\LandingPage;
use App\Model\Product;
use App\Model\ProductRequest;
use Illuminate\Http\Request;

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
        ]);

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
            ]);
        }

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('product');
            unlink(public_path('storage/' . $product->image));
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
        unlink(public_path('storage/' . $product->image));
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }
}
