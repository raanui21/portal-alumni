<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TracerStudyBackOffice;

class TracerStudyBackOfficeController extends Controller
{
    public function index()
    {
        $tracerStudies = TracerStudyBackOffice::all();
        return view('backoffice.tracer-study.index', compact('tracerStudies'));
    }

    public function create()
    {
        return view('backoffice.tracer-study.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nim' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'asal_prodi' => 'required|string',
            'nama' => 'required|string',
            'agama' => 'required|string',
            'hp' => 'required|string',
            'email' => 'required|email',
            'tahun_masuk' => 'required|string',
            'tahun_lulus' => 'required|string',
            'status' => 'required|string',
            'mulai_mencari' => 'required|string',
            'tingkat_pekerjaan' => 'required|string',
            'cara_mencari_pekerjaan' => 'required|json',
            'pekerjaan' => 'required|string',
            'jarak_tahun_lulus' => 'required|string',
            'range_gaji' => 'required|string',
            'jenis_perusahaan' => 'required|string',
            'kesesuaian' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'provinsi_kerja' => 'required|string',
            'kabupaten_kerja' => 'required|string',
            'tingkat_pendidikan' => 'required|string',
            'studi_yang_diambil' => 'required|string',
            'nama_institusi' => 'required|string',
            'lokasi_kampus' => 'required|string',
        ]);

        TracerStudyBackOffice::create($data);
        return redirect()->route('tracer-study-backoffice.index')->with('success', 'Tracer Study created successfully.');
    }

    public function show($id)
    {
        $tracerStudy = TracerStudyBackOffice::findOrFail($id);
        return view('backoffice.tracer-study.show', compact('tracerStudy'));
    }

    public function edit($id)
    {
        $tracerStudy = TracerStudyBackOffice::findOrFail($id);
        return view('backoffice.tracer-study.edit', compact('tracerStudy'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nim' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'asal_prodi' => 'required|string',
            'nama' => 'required|string',
            'agama' => 'required|string',
            'hp' => 'required|string',
            'email' => 'required|email',
            'tahun_masuk' => 'required|string',
            'tahun_lulus' => 'required|string',
            'status' => 'required|string',
            'mulai_mencari' => 'required|string',
            'tingkat_pekerjaan' => 'required|string',
            'cara_mencari_pekerjaan' => 'required|',
            'pekerjaan' => 'required|string',
            'jarak_tahun_lulus' => 'required|string',
            'range_gaji' => 'required|string',
            'jenis_perusahaan' => 'required|string',
            'kesesuaian' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'provinsi_kerja' => 'required|string',
            'kabupaten_kerja' => 'required|string',
            'tingkat_pendidikan' => 'required|string',
            'studi_yang_diambil' => 'required|string',
            'nama_institusi' => 'required|string',
            'lokasi_kampus' => 'required|string',
        ]);
        $data['cara_mencari_pekerjaan'] = json_decode($data['cara_mencari_pekerjaan']);
        $tracerStudy = TracerStudyBackOffice::findOrFail($id);
        $tracerStudy->update($data);

        return redirect()->route('tracer-study-backoffice.index')->with('success', 'Tracer Study updated successfully.');
    }

    public function destroy($id)
    {
        $tracerStudy = TracerStudyBackOffice::findOrFail($id);
        $tracerStudy->delete();

        return redirect()->route('tracer-study-backoffice.index')->with('success', 'Tracer Study deleted successfully.');
    }
}
