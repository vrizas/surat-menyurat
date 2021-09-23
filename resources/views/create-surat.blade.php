<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butuh Surat</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create-surat.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    @livewireStyles
</head>
<body>
    <header>
        <a href="{{ url('/') }}" class="logo">
            <img src="{{asset('img/logo.svg')}}" alt="Logo Butuh Surat">
            <div class='text'>
                <h1>Butuh Surat</h1>
                <p>Surat Menyurat Kelurahan Lowokwaru</p>
            </div>
        </a>
        <nav>
            <ul>
                <li><a href="" class="user">Admin <i class='bx bxs-chevron-down' ></i></a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}" class="drop-down-content">
                @csrf
                <div class="options">
                    <button class="btn-logout"><i class='bx bx-log-out' ></i> Keluar</button>
                </div>
            </form>
        </nav>
    </header>
    <main>
        <nav>
            <ul>
                <li class="active">Pilih Surat</li>
                <li><i class='bx bxs-chevrons-right'></i></li>
                <li>Input Data</li>
                <li><i class='bx bxs-chevrons-right'></i></li>
                <li>Cetak Surat</li>
            </ul>
        </nav>
        <article class="pilih-surat">
            <button id='surat-pengantar-button'>Surat Pengantar</button>
        </article>
        <article class="input-data-warga">  
            <h3>Surat Pengantar</h3>
            <livewire:cetak-surat-pengantar/>
        </article>
    </main>
    <footer>
        &copy; 2021, Butuh Surat.
    </footer>
    <script src="{{ asset('js/create-surat.js') }}"></script>
    <script src="{{ asset('js/user-option.js') }}"></script>
    @livewireScripts
</body>
</html>