{{-- Debug --}}
{{-- @dd($mahasiswa) --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" /> <!-- Tambahkan link ini -->
    <style>
        body {
            background-color: #f7f9fc;
        }

        .dashboard-container {
            margin-top: 50px;
        }

        .card-header {
            background-color: #5a67d8;
            color: white;
        }

        .btn-purple {
            background-color: #5a67d8;
            color: white;
        }

        .btn-purple:hover {
            background-color: #434aa8;
        }

        .nav-item .nav-link {
            color: #5a67d8 !important;
        }

        .nav-item .nav-link:hover {
            color: #434aa8 !important;
        }
    </style>
</head>

<body>
    <div class="container dashboard-container">
        <h1 class="text-center text-primary">Welcome, {{ session('admin')->username }}!</h1>
        <p class="text-center">Anda berhasil login sebagai admin.</p>

     <div class="card">
            <div class="card-header">
                <h2 class="text-center">Dashboard Admin E Poliklinik Udinus</h2>
            </div>

            <a href="/login" class="btn btn-danger w-100">
                <i class="bi bi-box-arrow-left"></i> Logout
            </a>

            <div class="card-body">
                <div class="mt-4 container">

                    <!-- SECTION: Dokter -->
                   <div class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Manajemen Dokter</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahDokter">
            <i class="bi bi-plus-circle"></i> Tambah Dokter
        </button>
    </div>
<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Spesialis</th>
            <th>Deskripsi</th>
            <th>Poli</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dokters as $dokter)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $dokter->foto) }}" class="img-thumbnail" width="60"
                         onerror="this.src='https://via.placeholder.com/60'" />
                </td>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->spesialis }}</td>
                <td>{{ $dokter->deskripsi }}</td>
                <td>{{ $dokter->poli->nama_poli ?? '-' }}</td>

                <td>
                    <button class="btn btn-sm btn-warning"
                            onclick="editDokter({{ $dokter->toJson() }})"
                            data-bs-toggle="modal" data-bs-target="#modalEditDokter">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <form action="{{ route('dokter.destroy', $dokter->id_dokter) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus dokter ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>


                   <!-- SECTION: Mahasiswa -->
<div class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Manajemen Mahasiswa</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahMahasiswa">
            <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
        </button>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Status Aktif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->prodi }}</td>
                <td>{{ $mhs->status_aktif ? 'Aktif' : 'Tidak Aktif' }}</td>
                <td>
                    <!-- Edit Button -->
                    <button class="btn btn-sm btn-warning btn-edit-mhs"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEditMahasiswa"
                        data-nim="{{ $mhs->nim }}"
                        data-nama="{{ $mhs->nama }}"
                        data-prodi="{{ $mhs->prodi }}"
                        data-status="{{ $mhs->status_aktif }}">
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <!-- Delete Form -->
                    <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="modalTambahMahasiswa" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input name="nim" class="form-control mb-2" placeholder="NIM" required />
                    <input name="nama" class="form-control mb-2" placeholder="Nama" required />
                    <input name="prodi" class="form-control mb-2" placeholder="Prodi" required />
                    <select name="status_aktif" class="form-control" required>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Mahasiswa (Reusable) -->
<div class="modal fade" id="modalEditMahasiswa" tabindex="-1">
    <div class="modal-dialog">
        <form id="formEditMahasiswa" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input name="nama" id="editNama" class="form-control mb-2" placeholder="Nama" required />
                    <input name="prodi" id="editProdi" class="form-control mb-2" placeholder="Prodi" required />
                    <select name="status_aktif" id="editStatus" class="form-control" required>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript: Set data ke modal edit -->
<script>
    document.querySelectorAll('.btn-edit-mhs').forEach(button => {
        button.addEventListener('click', function () {
            const nim = this.dataset.nim;
            const nama = this.dataset.nama;
            const prodi = this.dataset.prodi;
            const status = this.dataset.status;

            const form = document.getElementById('formEditMahasiswa');
            form.action = `/mahasiswa/${nim}`; // pastikan ini sesuai route update kamu

            document.getElementById('editNama').value = nama;
            document.getElementById('editProdi').value = prodi;
            document.getElementById('editStatus').value = status;
        });
    });
</script>


<h4 class="mb-3">Manajemen Antrian Hari Ini</h4>

@php
    // Mapping kode poli ke nama lengkap
    $namaPoli = [
        'PUM' => 'Poli Umum',
        'PGG' => 'Poli Gigi',
        'PGZ' => 'Poli Gizi',
        'PKM' => 'Poli Jiwa'
    ];
@endphp

@isset($antrians)
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Poli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($antrians as $index => $antrian)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $antrian->nim }}</td>
                    <td>{{ $namaPoli[$antrian->id_poli] ?? 'Tidak Diketahui' }}</td>
                    <td>
                        <form action="{{ route('admin.antrian.destroy', ['nomor_antrian' => $antrian->nomor_antrian]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus antrian ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-x-circle"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada antrian hari ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@else
    <div class="alert alert-warning">Data antrian tidak tersedia.</div>
@endisset



<!-- Modal Tambah Dokter --><div class="modal fade" id="modalTambahDokter" tabindex="-1" aria-labelledby="modalTambahDokterLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('dokter.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDokterLabel">Tambah Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">

                <!-- Foto Dokter -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Dokter</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Nama Dokter -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Dokter</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Spesialis -->
                <div class="mb-3">
                    <label for="spesialis" class="form-label">Spesialis</label>
                    <input type="text" class="form-control" name="spesialis" id="spesialis" value="{{ old('spesialis') }}" required>
                    @error('spesialis')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Poli (Dropdown) -->
                <div class="mb-3">
                    <select class="form-select" name="id_poli" id="id_poli" required>
   <option value="" disabled selected>-- Pilih Poli --</option>
@foreach ($polis as $poli)
    <option value="{{ $poli->id_poli }}" {{ old('id_poli') == $poli->id_poli ? 'selected' : '' }}>
        {{ $poli->id_poli }}
    </option>
@endforeach

</select>


            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>


            </div>


        </form>
    </div>
</div>



                    <!-- Modal Edit Dokter -->
                 <div class="modal fade" id="modalEditDokter" tabindex="-1" aria-labelledby="modalEditDokterLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" enctype="multipart/form-data" id="formEditDokter">
            @csrf
            @method('PUT') <!-- Gunakan PUT untuk update -->

            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDokterLabel">Edit Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id_dokter" id="idEditDokter">

                <!-- Foto -->
                <div class="mb-3">
                    <label for="fotoEditDokter" class="form-label">Foto Dokter</label>
                    <input type="file" class="form-control" name="foto" id="fotoEditDokter">
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label for="namaEditDokter" class="form-label">Nama Dokter</label>
                    <input type="text" class="form-control" name="nama" id="namaEditDokter" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsiEditDokter" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsiEditDokter" rows="3" required></textarea>
                </div>

                <!-- Spesialis -->
                <div class="mb-3">
                    <label for="spesialisEditDokter" class="form-label">Spesialis</label>
                    <input type="text" class="form-control" name="spesialis" id="spesialisEditDokter" required>
                </div>

                <!-- ID Poli Dropdown -->
                <div class="mb-3">
                    <label for="idPoliEditDokter" class="form-label">Poli</label>
                    <select class="form-select" name="id_poli" id="idPoliEditDokter" required>
                        <option value="">-- Pilih Poli --</option>
                        @foreach($polis as $poli)
                            <option value="{{ $poli->id_poli }}">{{ $poli->nama_poli }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Batal
                </button>
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="bi bi-check-circle"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>



                    <!-- Modal Hapus Dokter -->
                   <div class="modal fade" id="modalHapusDokter" tabindex="-1" aria-labelledby="modalHapusDokterLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="" id="formHapusDokter">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <h5 class="modal-title" id="modalHapusDokterLabel">Hapus Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus dokter ini?</p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
            </div>
        </form>
    </div>
</div>

<hr>
<h4 class="mt-5 fw-bold">Manajemen Jadwal Dokter</h4>

<!-- Form Tambah -->
<form action="{{ route('admin.jadwal.store') }}" method="POST" class="row g-2 mb-3 mt-3">
    @csrf
    <div class="col-md-4">
        <select name="id_dokter" class="form-select" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach ($dokters as $dokter)
                <option value="{{ $dokter->id_dokter }}">{{ $dokter->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <input type="text" name="hari_jaga" class="form-control" placeholder="Hari (Senin, Rabu)" required>
    </div>
    <div class="col-md-3">
        <input type="text" name="jam" class="form-control" placeholder="Jam (08:00 - 11:00)" required>
    </div>
    <div class="col-md-2 d-grid">
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</form>

@if(isset($jadwals) && $jadwals->count())
    <h3>Manajemen Jadwal Dokter</h3>

    <!-- Tabel Jadwal -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama Dokter</th>
                <th>Hari Jaga</th>
                <th>Jam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
            <tr>
                <td>{{ $jadwal->dokter->nama }}</td>
                <td>{{ $jadwal->hari_jaga }}</td>
                <td>{{ $jadwal->jam }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.jadwal.destroy', $jadwal->id_jadwal) }}">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif





                </div>
            </div>
        </div>
    </div><script>
    function editDokter(dokter) {
        document.getElementById('idEditDokter').value = dokter.id_dokter;
        document.getElementById('namaEditDokter').value = dokter.nama;
        document.getElementById('spesialisEditDokter').value = dokter.spesialis;
        document.getElementById('deskripsiEditDokter').value = dokter.deskripsi;
        document.getElementById('fotoEditDokter').value = '';
        document.getElementById('idPoliEditDokter').value = dokter.id_poli;

        document.getElementById('formEditDokter').action = `/admin/dokter/${dokter.id_dokter}`;
    }
</script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
