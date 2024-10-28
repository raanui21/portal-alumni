<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobSearchResource;
use App\Models\JobSearch;
use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    public function getAllJobs(Request $request)
    {
        $jobs = JobSearch::orderBy("updated_at", "desc")->get();
        return JobSearchResource::collection($jobs);
    }
}
