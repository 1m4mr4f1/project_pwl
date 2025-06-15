@props(['dokters'])

<style>
    .custom-btn {
        background-color: #5a67d8;
        color: white;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        border: none;
    }

    .custom-btn:hover {
        background-color: #434aa8;
    }

    .doctor-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 16px;
        background-color: #fff;
    }

    .doctor-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }

    .doctor-name {
        font-weight: 600;
        font-size: 1.1rem;
        margin-top: 15px;
        text-align: center;
        min-height: 3.2em;
    }

    .doctor-desc {
        flex-grow: 1;
        text-align: center;
        margin-top: 10px;
        font-size: 0.95rem;
        min-height: 4.5em;
    }

    .doctor-footer {
        margin-top: auto;
        text-align: center;
        width: 100%;
    }
</style>

<h2 class="fw-bold fs-1 poppins pt-4 pb-1 text-center" style="color: #5a67d8" id="OurDoctors">Dokter Kami</h2>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach ($dokters as $dokter)
            <div class="col">
                <div class="doctor-card">
                    <img src="{{ asset('storage/' . $dokter->foto) }}" alt="{{ $dokter->nama }}" class="doctor-img"
                        onerror="this.src='https://via.placeholder.com/200x200'" />
                    <div class="doctor-name">{{ $dokter->nama }}</div>
                    <div class="doctor-desc">{{ $dokter->deskripsi }}</div>
                    <div class="doctor-footer">
                        <button class="custom-btn" data-bs-toggle="modal" data-bs-target="#modalDokter{{ $dokter->id_dokter }}">
                            Selengkapnya ..
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Dokter (diletakkan di luar row agar tidak merusak grid) -->
    @foreach ($dokters as $dokter)
        <div class="modal fade" id="modalDokter{{ $dokter->id_dokter }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $dokter->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/' . $dokter->foto) }}" alt="{{ $dokter->nama }}" class="img-fluid mb-3"
                            onerror="this.src='https://via.placeholder.com/400x300'" />
                        <p>{{ $dokter->deskripsi }}</p>
                        <p><strong>Spesialis:</strong> {{ $dokter->spesialis }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
