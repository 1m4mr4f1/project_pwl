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
        <!-- Card Dokter -->
        <div class="col">
            <div class="doctor-card">
                <img src="https://assets.pikiran-rakyat.com/crop/0x0:720x449/220x140/photo/2021/09/08/3413986819.jpg" alt="dr. Tirta Cipeng" class="doctor-img">
                <div class="doctor-name">dr. Tirta Cipeng</div>
                <div class="doctor-desc">Dokter umum berpengalaman dalam diagnosis penyakit ringan hingga kronis.</div>
                <div class="doctor-footer">
                    <button class="custom-btn" data-bs-toggle="modal" data-bs-target="#modalDokter1">Selengkapnya ..</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="doctor-card">
                <img src="https://i.pinimg.com/736x/6c/59/95/6c599523460f54ddeba81f3cd689ae04.jpg" alt="dr. Citra Ardianti" class="doctor-img">
                <div class="doctor-name">dr. Citra Ardianti, M.Gz</div>
                <div class="doctor-desc">Ahli gizi dengan pendekatan terapi nutrisi individual.</div>
                <div class="doctor-footer">
                    <button class="custom-btn" data-bs-toggle="modal" data-bs-target="#modalDokter2">Selengkapnya ..</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="doctor-card">
                <img src="https://i.pinimg.com/736x/4c/ee/6c/4cee6c22feeb033e76f96c293c48bb0a.jpg" alt="drg. Raka Dwi" class="doctor-img">
                <div class="doctor-name">drg. Raka Dwi Santosa</div>
                <div class="doctor-desc">Dokter gigi dengan keahlian dalam perawatan estetik dan konservatif.</div>
                <div class="doctor-footer">
                    <button class="custom-btn" data-bs-toggle="modal" data-bs-target="#modalDokter3">Selengkapnya ..</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="doctor-card">
                <img src="https://i.pinimg.com/736x/f2/75/21/f2752143d53dfa7e80e785b069734539.jpg" alt="dr. Maya Putri" class="doctor-img">
                <div class="doctor-name">dr. Maya Putri Saraswati, Sp.KJ</div>
                <div class="doctor-desc">Psikiater yang menangani kesehatan mental dan emosional.</div>
                <div class="doctor-footer">
                    <button class="custom-btn" data-bs-toggle="modal" data-bs-target="#modalDokter4">Selengkapnya ..</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="doctor-card">
                <img src="https://i.pinimg.com/736x/c2/db/2d/c2db2da630a1d117a3e1297ed7fd9b96.jpg" alt="dr. Aldi Rinaldi" class="doctor-img">
                <div class="doctor-name">dr. Aldi Rinaldi</div>
                <div class="doctor-desc">Dokter umum dengan spesialisasi pada penanganan penyakit tropis.</div>
                <div class="doctor-footer">
                    <button class="custom-btn" data-bs-toggle="modal" data-bs-target="#modalDokter5">Selengkapnya ..</button>
                </div>
            </div>
        </div>

    </div>
</div>
