<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PasienController extends Controller
{
    private function rules(?Pasien $pasien = null): array
    {
        return [
            'nama'              => 'required|string|max:255',
            'nik'               => ['required', 'digits:16', Rule::unique('pasiens', 'nik')->ignore($pasien)],
            'tanggal_lahir'     => 'required|date|before_or_equal:today',
            'jenis_kelamin'     => 'required|in:Laki-laki,Perempuan',
            'nomor_hp'          => 'required|string|max:20',
            'nomor_rekam_medis' => ['required', 'string', 'max:50', Rule::unique('pasiens', 'nomor_rekam_medis')->ignore($pasien)],
            'alamat'            => 'required|string',
            'nama_kontak'       => 'required|string|max:255',
            'nomor_kontak'      => 'required|string|max:20',
        ];
    }

    public function index()
    {
        $pasiens = Pasien::latest()->get();

        return view('pasiens.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        Pasien::create($data);

        return redirect()->route('pasiens.index')
            ->with('success', 'Data pasien berhasil ditambahkan!');
    }

    public function show(Pasien $pasien)
    {
        return view('pasiens.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        return view('pasiens.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $data = $request->validate($this->rules($pasien));

        $pasien->update($data);

        return redirect()->route('pasiens.index')
            ->with('success', 'Data pasien berhasil diperbarui!');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasiens.index')
            ->with('success', 'Data pasien berhasil dihapus!');
    }
}