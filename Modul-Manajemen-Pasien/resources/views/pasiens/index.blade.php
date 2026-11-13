@extends('layouts.app')

@section('title', 'Manajemen Pasien')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Manajemen Pasien</h1>

        @if (in_array(auth()->user()->role, ['admin', 'petugas']))
        <a href="{{ route('pasiens.create') }}"
           class="bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700">
            Tambah Pasien
        </a>
        @endif
        
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3">No</th>
                    <th class="p-3">No. Rekam Medis</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">NIK</th>
                    <th class="p-3">Tanggal Lahir</th>
                    <th class="p-3">Jenis Kelamin</th>
                    <th class="p-3">No. HP</th>
                    <th class="p-3">Alamat / Domisili</th>
                    <th class="p-3">Nama Kontak Darurat</th>
                    <th class="p-3">No. Kontak Darurat</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pasiens as $pasien)
                    <tr class="border-t">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $pasien->nomor_rekam_medis }}</td>
                        <td class="p-3">{{ $pasien->nama }}</td>
                        <td class="p-3">{{ $pasien->nik }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d M Y') }}</td>
                        <td class="p-3">{{ $pasien->jenis_kelamin }}</td>
                        <td class="p-3">{{ $pasien->nomor_hp }}</td>
                        <td class="p-3">{{ $pasien->alamat }}</td>
                        <td class="p-3">{{ $pasien->nama_kontak }}</td>
                        <td class="p-3">{{ $pasien->nomor_kontak }}</td>
                        <td class="p-3">
                            <div class="flex items-center gap-3">
                                @if (in_array(auth()->user()->role, ['admin', 'petugas']))
                                <a href="{{ route('pasiens.edit', $pasien) }}" class="text-yellow-600 hover:underline">Edit</a>
                                @endif
                                @if (auth()->user()->role === 'admin')
                                <form action="{{ route('pasiens.destroy', $pasien) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data pasien ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="p-6 text-center text-gray-500">Belum ada data pasien.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection