<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Menyurat</title>
    <link rel="stylesheet" href="{{ asset('css/cetak.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <link rel="stylesheet" href="dist/paper.css">
    <style>@page { size: A4 }</style>
</head>
<body class='A4'>
    <section class="sheet padding-10mm">
        <header>
            <h1>RUKUN TETANGGA {{$member->rt}} RUKUN WARGA {{$member->rw}}</h1>
            <h1>KELURAHAN LOWOKWARU KECAMATAN LOWOKWARU</h1>
            <h1>KOTA MALANG</h1>
        </header>
        <main>
            <article class="pembuka">
                <p>Malang, {{$today}}</p>
                <p>Kepada:</p>
                <p>Yth. Sdr.</p>
                <p>Lurah Lowokwaru</p>
                <p>Kecamatan Lowokwaru</p>
                <p>di</p>
                <p>MALANG</p>
            </article>
            <article class="isi">
                <section>
                    <h1>SURAT PENGANTAR</h1>
                    <p class="nomor-surat">Nomor: {{$report->no}} / {{$member->rt}}-{{$member->rw}} / {{$rmwMonth}} {{$year}}</p>
                    <p class="indent">Yang bertanda tangan di bawah ini Ketua RT {{$member->rt}} {{$member->rw}} Kelurahan Lowokwaru Kecamatan Lowokwaru Kota Malang. Dengan ini menerangkan bahwa:</p>
                    <table class="data-warga">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{$member->nama}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            @if($member->jenisKelamin == 'Laki-Laki')
                            <td><span>Laki-Laki</span> / <span class='line-through'>Perempuan</span></td>
                            @elseif($member->jenisKelamin == 'Perempuan')
                            <td><span class='line-through'>Laki-Laki</span> / <span>Perempuan</span></td>
                            @endif
                            
                        </tr>
                        <tr>
                            <td>Tempat/Tgl.Lahir</td>
                            <td>:</td>
                            <td>{{$member->ttl}}</td>
                        </tr><tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{$member->agama}}</td>
                        </tr><tr>
                            <td>Status</td>
                            <td>:</td>
                            @if($member->status == 'Belum Kawin')
                            <td><span>Belum Kawin</span> / <span class='line-through'>Kawin</span> / <span class='line-through'>Cerai Hidup</span> / <span class='line-through'>Cerai Mati</span></td>
                            @elseif($member->status == 'Kawin')
                            <td><span class='line-through'>Belum Kawin</span> / <span>Kawin</span> / <span class='line-through'>Cerai Hidup</span> / <span class='line-through'>Cerai Mati</span></td>
                            @elseif($member->status == 'Cerai Hidup')
                            <td><span class='line-through'>Belum Kawin</span> / <span class='line-through'>Kawin</span> / <span>Cerai Hidup</span> / <span class='line-through'>Cerai Mati</span></td>
                            @elseif($member->status == 'Cerai Mati')
                            <td><span class='line-through'>Belum Kawin</span> / <span class='line-through'>Kawin</span> / <span class='line-through'>Cerai Hidup</span> / <span>Cerai Mati</span></td>
                            @endif
                        </tr><tr>
                            <td>Kewarganegaraan</td>
                            <td>:</td>
                            <td>{{$member->negara}}</td>
                        </tr><tr>
                            <td>Pendidikan</td>
                            <td>:</td>
                            <td>{{$member->pendidikan}}</td>
                        </tr><tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{$member->pekerjaan}}</td>
                        </tr><tr>
                            <td>Nomor NIK</td>
                            <td>:</td>
                            <td>{{$member->nik}}</td>
                        </tr><tr>
                            <td>Nomor Kartu Keluarga</td>
                            <td>:</td>
                            <td>{{$member->noKk}}</td>
                        </tr><tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{$member->alamat}}</td>
                        </tr><tr>
                            <td>Keperluan</td>
                            <td>:</td>
                            <td>{{$report->keperluan}}</td>
                        </tr>
                    </table>
                    <p class="indent">Demikian untuk menjadikan periksa dan dipergunakan sebagaimana mestinya.</p>
                    <table class="data-surat">
                        <tr>
                            <td>Nomor</td>
                            <td>:</td>
                            <td>{{$report->no}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>{{$report->tanggal}}</td>
                        </tr>
                    </table>
                </section>
                <section class="mengetahui">
                    <div class="rw">
                        <p>Mengetahui,</p>
                        <p>KETUA RW {{$member->rw}}</p>
                        <p>KELURAHAN LOWOKWARU</p>
                        <div class="tanda-tangan">
                            <img src="{{asset('img/')}}/{{$RW->tandaTangan}}"></img>
                        </div>
                        <p class="nama">{{$RW->nama}}</p>
                    </div>
                    <div class="rt">
                        <p>Mengetahui,</p>
                        <p>KETUA RT {{$member->rt}}</p>
                        <p>KELURAHAN LOWOKWARU</p>
                        <div class="tanda-tangan">
                            <img src="{{asset('img/')}}/{{$RT->tandaTangan}}"></img>
                        </div>
                        <p class="nama">{{$RT->nama}}</p>
                    </div>
                </section>
            </article>
        </main>
    </section>
    <script>
        window.print();
    </script>
</body>
</html>