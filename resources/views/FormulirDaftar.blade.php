<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Poliklinik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #0a2db0; /* mirip biru gelap template */
      height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .custom-card {
      background: #fff;
      border-radius: 30px;
      overflow: hidden;
      width: 900px;
      max-width: 100%;
      display: flex;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .form-side {
      flex: 1;
      padding: 50px;
    }

    .image-side {
      flex: 1;
      background-image: url('https://serbakuliahan.wordpress.com/wp-content/uploads/2019/10/img20191016073509.jpg?w=1024'); /* gunakan path lokal */
      background-size: cover;
      background-position: center;
    }

    .form-side h3 {
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
    }

    .btn-primary {
      background-color: #0a2db0;
      border: none;
    }

    .btn-primary:hover {
      background-color: #001b80;
    }

    label {
      font-weight: 500;
    }

    .form-control, .form-select {
      border-radius: 12px;
    }

    .btn-secondary {
      margin-top: 10px;
      background-color: #6c757d;
      border: none;
    }

    .btn-secondary:hover {
      background-color: #5a6268;
    }

    @media screen and (max-width: 768px) {
      .custom-card {
        flex-direction: column;
      }

      .image-side {
        height: 200px;
      }
    }
  </style>
</head>
<body>

<div class="custom-card">
  <div class="form-side">
    <h3>Formulir Pendaftaran</h3>
    <form method="POST" action="{{ route('pendaftaran.submit') }}">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
               id="name" name="name" placeholder="Masukkan nama Anda"
               value="{{ old('name') }}" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control @error('nim') is-invalid @enderror"
               id="nim" name="nim" placeholder="Masukkan NIM Anda"
               value="{{ old('nim') }}" required>
        @error('nim')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="poli" class="form-label">Pilih Poli</label>
        <select class="form-select" id="poli" name="poli" required>
          <option value="" disabled selected>-- Pilih Poli --</option>
          <option value="PGG">Poli Gigi</option>
          <option value="PUM">Poli Umum</option>
          <option value="PGZ">Poli Gizi</option>
          <option value="PKM">Poli Kesehatan Mental</option>
        </select>
        @error('poli')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary w-100 mt-3">Daftar sekarang</button>

      @if(session('success'))
        <div class="alert alert-success mt-3">
          {{ session('success') }}
        </div>
      @endif

      <a href="/" class="btn btn-secondary w-100">Kembali ke Home</a>
    </form>
  </div>

  <div class="image-side"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
