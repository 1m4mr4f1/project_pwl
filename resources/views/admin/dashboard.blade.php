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
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="https://via.placeholder.com/60" class="img-thumbnail" width="60" /></td>
                                    <td>dr. Chuan We</td>
                                    <td>Dokter umum berpengalaman dan terpercaya</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalEditDokter"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalHapusDokter"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
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
                                        <!-- Edit Button (opsional) -->
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalEditMahasiswa{{ $mhs->nim }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Delete Form -->
                                        <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Edit Mahasiswa -->
                                <div class="modal fade" id="modalEditMahasiswa{{ $mhs->nim }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('mahasiswa.update', $mhs->nim) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Mahasiswa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input name="nama" class="form-control mb-2" value="{{ $mhs->nama }}"
                                                        placeholder="Nama" required />
                                                    <input name="prodi" class="form-control mb-2" value="{{ $mhs->prodi }}"
                                                        placeholder="Prodi" required />
                                                    <select name="status_aktif" class="form-control" required>
                                                        <option value="1" {{ $mhs->status_aktif ? 'selected' : '' }}>
                                                            Aktif</option>
                                                        <option value="0" {{ !$mhs->status_aktif ? 'selected' : '' }}>
                                                            Tidak Aktif</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

                    <!-- SECTION: Antrian -->
                    <div>
                        <h4 class="mb-3">Manajemen Antrian Hari Ini</h4>
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Poli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ahmad Fauzan</td>
                                    <td>A11.2022.12345</td>
                                    <td>Poli Umum</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-x-circle"></i> Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Tambah Dokter -->
                    <div class="modal fade" id="modalTambahDokter" tabindex="-1" aria-labelledby="modalTambahDokterLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTambahDokterLabel">Tambah Dokter</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="fotoDokter" class="form-label">Foto Dokter</label>
                                        <input type="file" class="form-control" id="fotoDokter" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="namaDokter" class="form-label">Nama Dokter</label>
                                        <input type="text" class="form-control" id="namaDokter" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsiDokter" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsiDokter" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-danger" type="button"><i
                                            class="bi bi-x-circle"></i> Batal</button>
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="bi bi-check-circle"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Edit Dokter -->
                    <div class="modal fade" id="modalEditDokter" tabindex="-1" aria-labelledby="modalEditDokterLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditDokterLabel">Edit Dokter</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="fotoEditDokter" class="form-label">Foto Dokter</label>
                                        <input type="file" class="form-control" id="fotoEditDokter" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="namaEditDokter" class="form-label">Nama Dokter</label>
                                        <input type="text" class="form-control" id="namaEditDokter" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsiEditDokter" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsiEditDokter" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-danger" type="button"><i
                                            class="bi bi-x-circle"></i> Batal</button>
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="bi bi-check-circle"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Hapus Dokter -->
                    <div class="modal fade" id="modalHapusDokter" tabindex="-1" aria-labelledby="modalHapusDokterLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content">
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

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
