<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\TracerStudy;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TracerStudyController extends Controller
{
    public function index()
    {
        return view('backoffice.tracer-study.index');
    }

    public function data()
    {
        $tracerStudies = TracerStudy::all();
        return DataTables::of($tracerStudies)
            ->addColumn('action', function($row){
                return '<a href="'.route('backoffice.tracer-study.edit', $row->id).'" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->make(true);
    }
}
