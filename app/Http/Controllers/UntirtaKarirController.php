<?php

namespace App\Http\Controllers;

use App\Models\UntirtaKarir;
use Illuminate\Http\Request;

class UntirtaKarirController extends Controller
{
    public function index()
    {
        $jobs = UntirtaKarir::all();
        return view('frontoffice.untirta-karir.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_role' => 'nullable|string',
            'offers' => 'nullable|string',
            'contact' => 'nullable|string',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images', 'public');
            $validated['image_path'] = $imagePath;
        }

        UntirtaKarir::create($validated);

        return redirect()->route('frontoffice.untirta-karir');
    }

    public function show($id)
    {
        $job = UntirtaKarir::findOrFail($id);
        return view('frontoffice.untirta-karir.show', compact('job'));
    }
}
