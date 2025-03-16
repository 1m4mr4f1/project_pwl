<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Poliklinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #7474FF; /* Warna latar belakang */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .custom-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex shadow-lg p-4 custom-card">
            <!-- Bagian Gambar -->
            <div class="col-3 d-flex align-items-center">
                <img src="https://serbakuliahan.wordpress.com/wp-content/uploads/2019/10/img20191016073509.jpg?w=1024"
                     alt="Gambar" class="img-fluid rounded">
            </div>

            <!-- Bagian Form -->
            <div class="col-9 ps-4">
                <h3 class="mb-3 text-center">Formulir Pendaftaran</h3>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" placeholder="Masukkan NIM Anda" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </form>

                <!-- Tombol Kembali ke Home -->
                <a href="/" class="btn btn-secondary w-100 mt-3">Kembali ke Home</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
