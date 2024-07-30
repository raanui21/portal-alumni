<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TracerStudy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TracerStudyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tracerStudy = TracerStudy::where('user_id', $user->id)->first();

        return view('frontoffice.tracer-study.index', compact('user', 'tracerStudy'));
    }

    public function store(Request $request)
    {
        Log::info('Request data: ', $request->all()); // Tambahkan log untuk debug

        $validatedData = $request->validate([
            'nim' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'asal_prodi' => 'required|string',
            'nama' => 'required|string',
            'agama' => 'required|string',
            'hp' => 'required|string',
            'email' => 'required|string|email',
            'tahun_masuk' => 'required|string',
            'tahun_lulus' => 'required|string',
            'mulai_mencari' => 'required|string',
            'tingkat_pekerjaan' => 'required|string',
            'cara_mencari_pekerjaan' => 'required|array',
            'pekerjaan' => 'required|string',
            'jarak_tahun_lulus' => 'required|string',
            'range_gaji' => 'required|string',
            'jenis_perusahaan' => 'required|string',
            'kesesuaian' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'provinsi_kerja' => 'required|string',
            'kabupaten_kerja' => 'required|string',
            'tingkat_pendidikan' => 'required|string',
            'studi_yang_diambil' => 'nullable|string',
            'nama_institusi' => 'nullable|string|required_with:studi_yang_diambil',
            'lokasi_kampus' => 'nullable|string|required_with:studi_yang_diambil',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['cara_mencari_pekerjaan'] = json_encode($validatedData['cara_mencari_pekerjaan']);

        try {
            TracerStudy::updateOrCreate(
                ['user_id' => Auth::id()],
                $validatedData
            );
            Log::info('Data saved successfully'); // Log saat data berhasil disimpan
            return redirect()->back()->with('success', 'Data has been saved successfully!');
        } catch (\Exception $e) {
            // Log error untuk debug
            Log::error('Error saving tracer study data: ' . $e->getMessage());
            return redirect()->back()->withErrors('An error occurred while saving the data.');
        }
    }
}
