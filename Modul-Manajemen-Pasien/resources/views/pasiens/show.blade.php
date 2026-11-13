@extends('layouts.app')

@section('title', 'Detail Pasien')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-3xl font-bold mb-6">{{ $pasien->nama }}</h1>

        <dl class="grid grid-cols-1 sm:grid-cols-3 gap-y-3">
            <dt class="font-medium text-gray-500">Nomor Rekam Medis</dt>
            <dd class="sm:col-span-2">{{ $pasien->nomor_rekam_medis }}</dd>

            <dt class="font-medium text-gray-500">NIK</dt>
            <dd class="sm:col-span-2">{{ $pasien->nik }}</dd>

            <dt class="font-medium text-gray-500">Tanggal Lahir</dt>
            <dd class="sm:col-span-2">{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d M Y') }}</dd>

            <dt class="font-medium text-gray-500">Jenis Kelamin</dt>
            <dd class="sm:col-span-2">{{ $pasien->jenis_kelamin }}</dd>

            <dt class="font-medium text-gray-500">Nomor HP</dt>
            <dd class="sm:col-span-2">{{ $pasien->nomor_hp }}</dd>

            <dt class="font-medium text-gray-500">Alamat / Domisili</dt>
            <dd class="sm:col-span-2 whitespace-pre-line">{{ $pasien->alamat }}</dd>

            <dt class="font-medium text-gray-500">Nama Kontak Darurat</dt>
            <dd class="sm:col-span-2">{{ $pasien->nama_kontak }}</dd>

            <dt class="font-medium text-gray-500">No. Kontak Darurat</dt>
            <dd class="sm:col-span-2">{{ $pasien->nomor_kontak }}</dd>
        </dl>

        <a href="{{ route('pasiens.index') }}"
           class="inline-block mt-6 bg-gray-300 py-2 px-6 rounded-full hover:bg-gray-400">Kembali</a>
    </div>
@endsection