@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-semibold mb-6">Edit Pasien</h1>

        <form action="{{ route('pasiens.update', $pasien) }}" method="POST" class="bg-white p-6 rounded-lg shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block font-medium mb-2">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $pasien->nama) }}"
                       class="w-full p-3 border rounded-lg">
                @error('nama')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nik" class="block font-medium mb-2">NIK (16 digit)</label>
                <input type="text" name="nik" id="nik" value="{{ old('nik', $pasien->nik) }}"
                       class="w-full p-3 border rounded-lg">
                @error('nik')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block font-medium mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                       value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}"
                       class="w-full p-3 border rounded-lg">
                @error('tanggal_lahir')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="jenis_kelamin" class="block font-medium mb-2">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="w-full p-3 border rounded-lg">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nomor_hp" class="block font-medium mb-2">Nomor HP</label>
                <input type="text" name="nomor_hp" id="nomor_hp" value="{{ old('nomor_hp', $pasien->nomor_hp) }}"
                       class="w-full p-3 border rounded-lg">
                @error('nomor_hp')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nomor_rekam_medis" class="block font-medium mb-2">Nomor Rekam Medis</label>
                <input type="text" name="nomor_rekam_medis" id="nomor_rekam_medis"
                       value="{{ old('nomor_rekam_medis', $pasien->nomor_rekam_medis) }}"
                       class="w-full p-3 border rounded-lg">
                @error('nomor_rekam_medis')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat" class="block font-medium mb-2">Alamat / Domisili</label>
                <textarea name="alamat" id="alamat" rows="4"
                          class="w-full p-3 border rounded-lg">{{ old('alamat', $pasien->alamat) }}</textarea>
                @error('alamat')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nama_kontak" class="block font-medium mb-2">Nama Kontak Darurat</label>
                <input type="text" name="nama_kontak" id="nama_kontak"
                       value="{{ old('nama_kontak', $pasien->nama_kontak) }}"
                       class="w-full p-3 border rounded-lg">
                @error('nama_kontak')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nomor_kontak" class="block font-medium mb-2">Nomor Kontak Darurat</label>
                <input type="text" name="nomor_kontak" id="nomor_kontak"
                       value="{{ old('nomor_kontak', $pasien->nomor_kontak) }}"
                       class="w-full p-3 border rounded-lg">
                @error('nomor_kontak')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <a href="{{ route('pasiens.index') }}"
                   class="bg-gray-300 py-2 px-6 rounded-full hover:bg-gray-400">Kembali</a>
                <button type="submit"
                        class="bg-yellow-500 text-white py-2 px-6 rounded-full hover:bg-yellow-600">Update</button>
            </div>
        </form>
    </div>
@endsection