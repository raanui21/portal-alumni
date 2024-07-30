<?php

namespace App\Http\Controllers\backoffice;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller; // Import the base Controller class

class ArtikelBackofficeController extends Controller
{
    public function index()
    {
        $artikels = Artikel::all();
        return view('backoffice.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('backoffice.artikel.create');
    }

    public function store(Request $request)
    {
        Log::info($request->all());  // Debug: log all input data

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            'image_url' => 'nullable|url',
            'category' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        Log::info('Validation passed');  // Debug: log if validation passes

        $artikel = new Artikel($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $artikel->image = basename($path);
            $artikel->image_url = null;  // Clear the image URL if an image is uploaded
        }

        $artikel->save();

        Log::info('Artikel saved');  // Debug: log if artikel is saved

        return redirect()->route('backoffice.artikel.index')->with('success', 'Artikel berhasil dibuat.');
    }

    public function show(Artikel $artikel)
    {
        return view('backoffice.artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        return view('backoffice.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            'image_url' => 'nullable|url',
            'category' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        $artikel->fill($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $artikel->image = basename($path);
            $artikel->image_url = null;  // Clear the image URL if an image is uploaded
        }

        $artikel->save();

        return redirect()->route('backoffice.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect()->route('backoffice.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
