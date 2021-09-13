<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Menyurat</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create-surat.css') }}">
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
    </header>
    <main>
        <nav>
            <ul>
                <li class="active">Pemilihan Surat</li>
                <li><img src="{{asset('img/arrow.svg')}}"></li>
                <li >Input Data Warga</li>
                <li><img src="{{asset('img/arrow.svg')}}"></li>
                <li>Cetak Surat</li>
            </ul>
        </nav>
        <article class="pilih-surat">
            <button id='surat-pengantar-button'>Surat Pengantar</button>
        </article>
        <article class="input-data-warga">  
            <h2>Surat Pengantar</h2>
            <livewire:cetak-surat-pengantar/>
        </article>
    </main>

    <script src="{{ asset('js/create-surat.js') }}"></script>
    @livewireScripts
</body>
</html>