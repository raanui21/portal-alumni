<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\JobSearch;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $jobs = JobSearch::orderBy("id", "asc")->get();
        return view('frontoffice.career.index', ['jobs' => $jobs]);
    }

    public function show($id)
    {
        $job = JobSearch::findOrFail($id);
        return view('frontoffice.career.show', compact('job'));
    }
}

