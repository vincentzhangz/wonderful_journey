<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function showAllArticle()
    {
        $articles = Article::all();
        $categories = Category::all();
        return view('home', ['articles' => $articles, 'categories' => $categories]);
    }

    public function showArticleByCategory($id)
    {
        $articles = Article::where("category_id", '=', $id)->get();
        $categories = Category::all();
        return view('home', ['articles' => $articles, 'categories' => $categories]);
    }

    public function showArticleById($id)
    {
        $article = Article::where("id", '=', $id)->first();
        $categories = Category::all();
        return view('full', ['article' => $article, 'categories' => $categories]);
    }

    public function showArticleByUserId($id)
    {
        $article = Article::where("user_id", '=', $id)->get();
        $categories = Category::all();
        return view('blog', ['article' => $article, 'categories' => $categories]);
    }

    public function showCreateArticlePage()
    {
        $categories = Category::all();
        return view('newBlog', ['categories' => $categories]);
    }

    public function createNewArticle(ArticleRequest $request)
    {
        $categories = Category::all();
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->story;
        $article->image = "";
        $article->user_id = Auth::user()->id;
        $article->category_id = $request->category;
        $article->save();
        $article = Article::where("user_id", '=', Auth::user()->id)->get();
        return view('blog', ['article' => $article, 'categories' => $categories]);
    }

    public function deleteArticle($id)
    {
        Article::where("id", '=', $id)->delete();
        $article = Article::where("user_id", '=', Auth::user()->id)->get();
        $categories = Category::all();
        return view('blog', ['article' => $article, 'categories' => $categories]);
    }
}
