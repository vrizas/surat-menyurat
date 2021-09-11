<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Menyurat</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/data-kelurahan.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    @livewireStyles
</head>
<body>
    <header class='header'>
        <div class="logo">
            <img src="{{ asset('img/logo-malang.png') }}" alt="Logo Malang">
            <div class='text'>
                <h1>Surat Menyurat</h1>
                <p>Kelurahan Lowokwaru</p>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Buat Surat</a></li>
                <li><a href="{{ url('/data-warga') }}">Data Warga</a></li>
                <li><a href="{{ url('/data-kelurahan') }}">Data Kelurahan</a></li>
                <li><a href="{{ url('/buku-register') }}">Buku Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <form class="search-form">
                <input type="search" placeholder="masukkan nama atau nik">
                <input type="submit" value="Cari">
            </form>
        </section>
        <livewire:input-data-kelurahan/>
    </main>
    @livewireScripts
</body>
</html>