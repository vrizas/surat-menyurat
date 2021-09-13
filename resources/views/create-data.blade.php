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
                <li><a href="{{ url('/admin/buku-register') }}">Buku Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <h2>Antrian Cetak Surat</h2>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Keperluan</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($queues as $key => $queue)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$queue->nama}}</td>
                    <td>{{$queue->keperluan}}</td>
                    <td colspan="2">
                        <button class="btn-delete" wire:click="deleteQueue({{$queue->id}})">Hapus</button>
                        <button class="btn-cetak" wire:click="cetakSurat({{$queue->id}})">Cetak Surat</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </article>
    </main>
    <script>
        window.addEventListener( "pageshow", function ( event ) {
            const historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                window.location.reload();
        }
});
    </script>
    @livewireScripts
</body>
</html>