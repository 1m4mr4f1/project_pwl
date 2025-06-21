@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 fw-bold">Manajemen Jadwal Dokter</h3>

    <!-- Alert sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah Jadwal Dokter -->
    <form method="POST" action="{{ route('admin.jadwal.store') }}">
        @csrf
        <div class="row g-2 align-items-center mb-4">
            <div class="col-md-4">
                <select name="id_dokter" class="form-select" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id_dokter }}">{{ $dokter->nama }} ({{ $dokter->spesialis }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="hari_jaga" class="form-control" placeholder="Contoh: Senin, Rabu" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="jam" class="form-control" placeholder="Contoh: 08:00 - 11:00" required>
            </div>
            <div class="col-md-2 d-grid">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </div>
    </form>

    <!-- Tabel Jadwal Dokter -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>Nama Dokter</th>
                    <th>Hari Jaga</th>
                    <th>Jam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->dokter->nama }}</td>
                    <td>{{ $jadwal->hari_jaga }}</td>
                    <td>{{ $jadwal->jam }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.jadwal.destroy', $jadwal->id_jadwal) }}" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada jadwal dokter.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
