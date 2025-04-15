<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Tambahkan link ini -->
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
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditDokter"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapusDokter"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



<!-- SECTION: Dokter -->
<div class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Manajemen Mahasiswa</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahDokter">
            <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
        </button>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Muhammad Imam Rafi</td>
                <td>A11.2023.11111</td>
                <td>2023</td>
                <td>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditDokter"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapusDokter"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
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
                    <div class="modal fade" id="modalTambahDokter" tabindex="-1" aria-labelledby="modalTambahDokterLabel" aria-hidden="true">
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
                                    <button class="btn btn-sm btn-danger" type="button"><i class="bi bi-x-circle"></i> Batal</button>
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="bi bi-check-circle"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Edit Dokter -->
                    <div class="modal fade" id="modalEditDokter" tabindex="-1" aria-labelledby="modalEditDokterLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditDokterLabel">Edit Dokter</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="editNamaDokter" class="form-label">Nama Dokter</label>
                                        <input type="text" class="form-control" id="editNamaDokter" value="dr. Chuan We" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="editDeskripsiDokter" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="editDeskripsiDokter" rows="3" required>Dokter umum berpengalaman dan terpercaya</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-danger" type="button"><i class="bi bi-x-circle"></i> Batal</button>
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="bi bi-check-circle"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Hapus Dokter -->
                    <div class="modal fade" id="modalHapusDokter" tabindex="-1" aria-labelledby="modalHapusDokterLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalHapusDokterLabel">Hapus Dokter</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus dokter ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                                    <button class="btn btn-sm btn-primary" type="button"><i class="bi bi-check-circle"></i> Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Mahasiswa -->
                    <div class="modal fade" id="modalTambahMahasiswa" tabindex="-1" aria-labelledby="modalTambahMahasiswaLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTambahMahasiswaLabel">Tambah Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                                        <input type="text" class="form-control" id="namaMahasiswa" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="nimMahasiswa" class="form-label">NIM</label>
                                        <input type="text" class="form-control" id="nimMahasiswa" required />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="bi bi-check-circle"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="btn btn-purple w-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
