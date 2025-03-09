<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-Navbar></x-Navbar>
    <p>ini home page</p>
<div style="display: flex; margin: 5px; padding: 5px; ">
    @foreach(range(1, 5) as $i)
    <x-Card>

    </x-Card>
@endforeach
</div>


<a href="Daftar">daftar</a>
</body>
</html>
