<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E - Poliklinik</title>
</head>
<body>
    <x-Navbar></x-Navbar>
    <x-AboutUs id="AboutUs"></x-AboutUs>
    <x-DaftarLayanan></x-DaftarLayanan>
    <x-PelayananKami id="OurService"></x-PelayananKami>
    <x-OurDoctors :dokters="$dokters" />

    <x-JadwalDokter :jadwals="$jadwals" id="JadwalDokter" />


    {{-- Kirim data antrian ke komponen --}}

    <x-Antrian :antrians="$antrians" id="Antrian" />



    <x-Footer></x-Footer>
</body>
</html>




