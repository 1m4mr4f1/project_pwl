<h2 class="fw-bold fs-1 poppins pt-4 pb-1 text-center" style="color: #5a67d8" id="Antrian">Antrian Hari Ini</h2>

<div class="container mt-5 pb-3">
    <div class="card p-4 shadow-lg">

        @php
            $daftarPoli = [
                'PUM' => 'Poli Umum',
                'PGG' => 'Poli Gigi',
                'PGZ' => 'Poli Gizi',
                'PKM' => 'Poli Jiwa'
            ];
        @endphp

        @foreach($daftarPoli as $kode => $namaPoli)
            <h4 class="mt-5">{{ $namaPoli }}</h4>
            <div class="table-responsive mb-4">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>Nomor Antrian</th>
                            <th>NIM</th>
                            <th>Poli</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($antrians[$kode]) && count($antrians[$kode]) > 0)
                            @foreach($antrians[$kode] as $antrian)
                                <tr>
                                    <td>{{ $antrian->nomor_antrian }}</td>
                                    <td>{{ $antrian->nim }}</td>
                                    <td>{{ $namaPoli }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Belum ada antrian</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        @endforeach

    </div>
</div>
