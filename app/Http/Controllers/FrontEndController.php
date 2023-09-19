<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\CategoryArticle;
use App\Model\CategoryProduct;
use App\Model\Comment;
use App\Model\LandingPage;
use App\Model\LandingPageCarousel;
use App\Model\Product;
use App\Model\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{
    public function home()
    {
        $category = CategoryProduct::latest()->get();
        $landingpage = LandingPage::latest()->first();
        $carousel = LandingPageCarousel::latest()->first();
        
        return view('frontend.home', compact('category', 'landingpage', 'carousel'));
    }
    public function article()
    {
        $title = 'Articles';
        $article = Article::latest()->first();
        $category = CategoryArticle::get();
        if ($article != null) {
            $articles = Article::where('id', '!=', $article->id)->latest()->get();
        } else {
            $articles = null;
        }

        $landingpage = LandingPage::latest()->first();

        return view('frontend.article.index', compact('article', 'title', 'articles', 'category', 'landingpage'));
    }
    public function article_show(Article $article)
    {
        $title = 'Article - ' . $article->title;
        $articles_latest = Article::where('id', '!=', $article->id)->latest()->limit(3)->get();
        $article_relate_1 = Article::where('id', $article->relate_article_first)->first();
        $article_relate_2 = Article::where('id', $article->relate_article_second)->first();
        if (auth()->user()) {
            $article_self = Article::where('editor', auth()->user()->id)->pluck('id');
            $count_articles = count(Article::where('editor', auth()->user()->id)->get());
            $count_comment = count(Comment::whereIn('article_id', $article_self)->get());
            $count_views = Article::where('editor', auth()->user()->id)->select('views')->sum('views');
        } else {
            $count_articles = [];
            $count_comment = [];
            $count_views = [];
        }
        $comments = Comment::latest()->where('article_id', $article->id)->get();
        $comments_top = Comment::selectRaw('count(`article_id`) as `count_article_id`, `article_id`')
                                ->groupBy('article_id')
                                ->orderBy('count_article_id', 'DESC')
                                ->limit(3)
                                ->get();
        Article::where('id', $article->id)->increment('views', 1);
        $articles_popular = Article::orderBy('views', 'DESC')->limit(3)->get();
        $landingpage = LandingPage::latest()->first();

        return view('frontend.article.show', compact('article', 'title', 'landingpage', 
                                                     'articles_latest', 'articles_popular','article_relate_1', 'article_relate_2', 
                                                     'comments', 'comments_top', 
                                                     'count_articles', 'count_comment', 'count_views'));
    }
    public function article_filter($name)
    {
        $title = 'Articles - Category: ' . $name;
        $category = CategoryArticle::get();
        $category_name = CategoryArticle::where('name', $name)->first();
        $articles = Article::where('category_id', $category_name->id)->latest()->get();
        // $article = Article::latest()->first();
        // if (isset($article)) {
        // } else {
        //     $articles = $article;
        // }
        $landingpage = LandingPage::latest()->first();
        
        return view('frontend.article.index', compact('title', 'articles', 'category', 'landingpage'));
    }
    public function comment_article(Request $request)
    {
        $validated = request()->validate([
            'comment' => 'required|string',
            'user_id' => 'required|numeric',
            'article_id' => 'required|numeric',
        ]);
        Comment::create($validated);
        return redirect()->back()->with('success','Komentar anda telah terkirim!');
    }
    public function product()
    {
        $title = 'Products';
        $category = CategoryProduct::get();
        $products = Product::latest()->get();
        $landingpage = LandingPage::latest()->first();

        return view('frontend.product.index', compact('title', 'products', 'category', 'landingpage'));
    }
    public function product_show(Product $product)
    {
        $title = 'Products - ' . $product->name;
        $products = Product::latest()->limit(4)->where('id', '!=', $product->id)->where('category_id', $product->category_id)->get();
        $landingpage = LandingPage::latest()->first();

        return view('frontend.product.show', compact('title', 'product', 'products', 'landingpage'));
    }
    public function product_filter(Request $request, $name)
    {
        $title = 'Products';
        $category = CategoryProduct::get();
        $category_filter = CategoryProduct::where('name', $name)->first();
        $products = Product::where('category_id', $category_filter->id)->latest()->get();
        $landingpage = LandingPage::latest()->first();

        return view('frontend.product.index', compact('title', 'products', 'category', 'landingpage'));
    }
    public function product_request()
    {
        $validated = request()->validate([
            'product_id' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|string',
            'phone_number' => 'required|numeric',
            'address' => 'required|string',
            'request_product' => 'required|integer',
        ]);
        
        ProductRequest::create($validated);

        return redirect()->back()->with('success','Produk sukses di request! Tunggu admin menghubungi Anda');
    }
}
