@props(['jadwals'])

<h1 id="JadwalDokter"></h1>
<h2 class="fw-bold fs-1 poppins pt-4 pb-1 text-center" style="color: #5a67d8" id="JadwalDokter">Jadwal Dokter</h2>

<div class="container mt-5 pb-3">
    <div class="card p-4 shadow-lg">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Poli</th>
                        <th>Nama Dokter</th>
                        <th>Hari Jaga</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals->groupBy('dokter.poli.nama_poli') as $poli => $grup)
                        @foreach ($grup as $index => $jadwal)
                            <tr>
                                @if ($index === 0)
                                    <td rowspan="{{ $grup->count() }}">{{ $poli }}</td>
                                @endif
                                <td>{{ $jadwal->dokter->nama }}</td>
                                <td>{{ $jadwal->hari_jaga }}</td>
                                <td>{{ $jadwal->jam }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
