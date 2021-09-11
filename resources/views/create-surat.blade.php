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
        <nav>
            <ul>
                <li class="active">Pemilihan Surat</li>
                <li>></li>
                <li >Input Data Warga</li>
                <li>></li>
                <!-- <li>Input Data Kelurahan</li>
                <li>></li> -->
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
        <!-- <article class="input-data-kelurahan">
        <div class='form'> 
                <div>
                    <label for="nomor-urut">Nomor Urut</label>
                    <input  type="text" name="nomor-urut">
                </div>
                <div>
                    <label for="nomor-register-rw">Nomor Register RW</label>
                    <input type="text" name="nomor-register-rw">
                </div>
                <div>
                    <label for="tgl-buku-register-rw">Tanggal Buku Register RW</label>
                    <input  type="text" name="tgl-buku-register-rw">
                </div>
                <div>
                    <label for="tanda-tangan-rw">Tanda Tangan RW</label>
                    <select  name="tanda-tangan-rw">
                        <option value="rw 1">RW 1</option>
                        <option value="rw 2">RW 2</option>
                        <option value="rw 3">RW 3</option>
                        <option value="rw 4">RW 4</option>   
                    </select>
                </div>
                <div>
                    <label for="tanda-tangan-rt">Tanda Tangan RT</label>
                    <select  name="tanda-tangan-rt">
                        <option value="rt 1">RT 1</option>
                        <option value="rt 2">RT 2</option>
                        <option value="rt 3">RT 3</option>
                        <option value="rt 4">RT 4</option>   
                    </select>
                </div>
                <div class="buttons">
                    <button class='back'>Kembali</button>
                    <button wire:click="createKelurahan" class='cetak'>Cetak Surat</button>
                </div>
            </div> 
        </article> -->
    </main>

    <script src="{{ asset('js/create-surat.js') }}"></script>
    @livewireScripts
</body>
</html>