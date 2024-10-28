<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $articles = Article::where('id', 'LIKE', "%{$search}%")
            ->orWhere('title', 'LIKE', "%{$search}%")
            ->orderBy("updated_at", "desc")
            ->paginate(4);
        } else {
            $articles = Article::orderBy("updated_at", "desc")->paginate(5);
        }

        return view('backoffice.article.index', ['articles' => $articles, 'search' => $search]);
    }

    public function create()
    {
        return view('backoffice.article.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Article::create($data);

        return to_route('article.index')->with('success', 'article created');
    }

    public function edit(Article $article)
    {
        return view('backoffice.article.edit',['article'=> $article]);
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->all();

        $article->update($data);

        return redirect()->route('article.index')->with('success', 'Article updated');
    }

    public function destroy(Article $article){
        $article->delete();

        return to_route('article.index')->with('success', 'Article deleted');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('frontoffice.home.artikel', compact('article'));
    }
}

