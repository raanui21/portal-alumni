<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\JobSearch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $jobs = JobSearch::orderBy("id", "asc")->paginate(9);
        $articles = Article::orderBy("updated_at", "desc")->paginate(2);
        return view('frontoffice.home.index', ['jobs' => $jobs,'articles'=>$articles]);
    }
}
