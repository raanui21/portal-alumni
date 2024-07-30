<?php

namespace App\Http\Controllers;
use App\Models\UntirtaKarir;
use App\Models\Artikel;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $jobs = UntirtaKarir::all();
        $artikels = Artikel::all();
        
        return view('frontoffice/beranda.index', compact('jobs', 'artikels'));
    }

    public function showArtikel($id)
    {
        Log::info('showArtikel called with id: ' . $id);  // Tambahkan logging untuk debug
        $artikel = Artikel::findOrFail($id);
        return view('frontoffice/beranda.artikel', compact('artikel'));
    }
}
