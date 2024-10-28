<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\JobSearch;
use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $jobs = JobSearch::where('id', 'LIKE', "%{$search}%")
            ->orWhere('title', 'LIKE', "%{$search}%")
            ->orderBy("updated_at", "desc")
            ->paginate(4);
        } else {
            $jobs = JobSearch::orderBy("updated_at", "desc")->paginate(5);
        }
        return view('backoffice.jobSearch.index', ['jobs' =>$jobs, 'search' => $search]);
    }

    public function create()
    {
        return view('backoffice.jobSearch.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        JobSearch::create($data);

        return to_route('jobs.index')->with('success', 'job search created');
    }

    public function edit(JobSearch $job)
    {
        return view('backoffice.jobSearch.edit', ['job' => $job]);
    }

    public function update(Request $request, JobSearch $job)
    {
        $data = $request->all();

        $job->update($data);

       return redirect()->route('jobs.index')->with('success', 'Article updated');
    }

    public function destroy(JobSearch $job)
    {
        // dd($job->toArray());
        $job->delete();

        return to_route('jobs.index')->with('success', 'job search deleted');
    }
}
