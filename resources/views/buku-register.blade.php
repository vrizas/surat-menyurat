<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Menyurat</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/antri-cetak.css') }}">
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
                <li><a href="{{ url('/admin/list-cetak') }}">Antrian Cetak</a></li>
                <li><a href="{{ url('/admin/data-warga') }}">Data Warga</a></li>
                <li><a href="{{ url('/admin/data-kelurahan') }}">Data Kelurahan</a></li>
                <li><a href="{{ url('/admin/buku-regster') }}">Buku Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <button>Download PDF</button>
            <h2>Buku Register</h2>
            <table>
                <tr>
                    <th>No.</th>
                    <th>No. Register RW</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Keperluan</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td>Vrizas Izza Izzuddin</td>
                    <td></td>
                    <td>Nikah</td>
                    <td colspan="2">
                        <button class="btn-delete">Hapus</button>
                        <button class="btn-cetak">Cetak Surat</button>
                    </td>
                </tr>
            </table>
        </article>
    </main>
    @livewireScripts
</body>
</html>