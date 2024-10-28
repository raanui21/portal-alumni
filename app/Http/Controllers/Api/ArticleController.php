<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getAllArticles(Request $request)
    {
        $articles = Article::orderBy("updated_at", "desc")->get();
        return ArticleResource::collection($articles);
    }
}
