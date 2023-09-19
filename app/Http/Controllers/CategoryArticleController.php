<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\CategoryArticle;
use App\Model\LandingPage;
use Illuminate\Http\Request;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Category Article';

        $category = CategoryArticle::latest()->get();
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.article.category.index', compact('landingpage', 'category', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Category Article';

        $landingpage = LandingPage::latest()->first();

        return view('dashboard.article.category.create', compact('landingpage', 'title'));
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
            'image' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:1024',
            'name' => 'required|string|unique:category_articles,name',
        ]);

        $validated['image'] = $request->file('image')->store('category-article');

        CategoryArticle::create($validated);

        return redirect()->route('category_article.index')->with('success', 'Kategori artikel berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Show Category Article';

        $category = CategoryArticle::find($id);
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.article.category.show', compact('landingpage', 'category', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Category Article';

        $category = CategoryArticle::find($id);
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.article.category.edit', compact('landingpage', 'category', 'title'));
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
        $category = CategoryArticle::find($id);

        if ($request->name !== $category->name) {
            $validated = request()->validate([
                'image' => 'file|image|mimes:jpeg,jpg,png,gif|max:1024',
                'name' => 'required|string|unique:category_articles,name',
            ]);
        } else {
            $validated = request()->validate([
                'image' => 'file|image|mimes:jpeg,jpg,png,gif|max:1024',
                'name' => 'required|string',
            ]);
        }

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('category-article');
            unlink(public_path('storage/' . $category->image));
        }

        CategoryArticle::where('id', $category->id)->update($validated);
        return redirect()->route('category_article.index')->with('success', 'Kategori artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryArticle::find($id);
        $article = Article::get();

        if ($article->where('category_id', $category->id)->first() !== null) {
            unlink(public_path('storage/' . $category->image));
            $category->delete();

            foreach ($article->where('category_id', $category->id) as $row) {
                unlink(public_path('storage/' . $row->image));
                $row->delete();
            }
        } else {
            unlink(public_path('storage/' . $category->image));
            $category->delete();
        }

        return redirect()->route('category_article.index')->with('danger', 'Kategori artikel berhasil dihapus!');
    }
}
