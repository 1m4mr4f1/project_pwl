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
</style>

<h2 class="fw-bold fs-1 poppins pt-4 pb-1 text-center" style="color: #5a67d8" id="OurDoctors">Dokter Kami </h2>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-5 g-5">

        <x-doctor-card
            id="dokter1"
            name="dr. Tirta Cipeng"
            desc="Dokter umum berpengalaman dalam diagnosis penyakit ringan hingga kronis."
            image="https://assets.pikiran-rakyat.com/crop/0x0:720x449/220x140/photo/2021/09/08/3413986819.jpg"
            modalId="modalDokter1"
        />

        <x-doctor-card
            id="dokter2"
            name="dr. Citra Ardianti, M.Gz"
            desc="Ahli gizi dengan pendekatan terapi nutrisi individual."
            image="https://i.pinimg.com/736x/6c/59/95/6c599523460f54ddeba81f3cd689ae04.jpg"
            modalId="modalDokter2"
        />

        <x-doctor-card
            id="dokter3"
            name="drg. Raka Dwi Santosa"
            desc="Dokter gigi dengan keahlian dalam perawatan estetik dan konservatif."
            image="https://i.pinimg.com/736x/4c/ee/6c/4cee6c22feeb033e76f96c293c48bb0a.jpg"
            modalId="modalDokter3"
        />

        <x-doctor-card
            id="dokter4"
            name="dr. Maya Putri Saraswati, Sp.KJ"
            desc="Psikiater yang menangani kesehatan mental dan emosional."
            image="https://i.pinimg.com/736x/f2/75/21/f2752143d53dfa7e80e785b069734539.jpg"
            modalId="modalDokter4"
        />

        <x-doctor-card
            id="dokter5"
            name="dr. Aldi Rinaldi"
            desc="Dokter umum dengan spesialisasi pada penanganan penyakit tropis."
            image="https://i.pinimg.com/736x/c2/db/2d/c2db2da630a1d117a3e1297ed7fd9b96.jpg"
            modalId="modalDokter5"
        />

    </div>
</div>

{{-- Modal Section --}}
<x-doctor-modal
    id="modalDokter1"
    name="dr. Tirta Cipeng"
    specialist="Poli Umum"
    education="Fakultas Kedokteran UGM"
    experience="8 tahun praktik di Puskesmas dan klinik umum"
/>

<x-doctor-modal
    id="modalDokter2"
    name="dr. Citra Ardianti, M.Gz"
    specialist="Poli Gizi"
    education="Institut Pertanian Bogor (IPB)"
    experience="6 tahun pengalaman sebagai ahli gizi klinis"
/>

<x-doctor-modal
    id="modalDokter3"
    name="drg. Raka Dwi Santosa"
    specialist="Poli Gigi"
    education="Universitas Airlangga"
    experience="5 tahun dalam bidang konservasi gigi"
/>

<x-doctor-modal
    id="modalDokter4"
    name="dr. Maya Putri Saraswati, Sp.KJ"
    specialist="Poli Mental Health"
    education="Universitas Indonesia"
    experience="7 tahun menangani gangguan kecemasan dan depresi"
/>

<x-doctor-modal
    id="modalDokter5"
    name="dr. Aldi Rinaldi"
    specialist="Poli Umum"
    education="Universitas Andalas"
    experience="9 tahun menangani penyakit infeksi dan tropical disease"
/>
