<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Menyurat</title>
    <link rel="stylesheet" href="{{ asset('css/create-surat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cetak.css') }}">
    @livewireStyles
</head>
<body>
    <header>
        <h1 class="logo">Surat Menyurat</h1>
        <nav>
            <ul>
                <li><a href="">Buat Surat</a></li>
                <li><a href="">Daftar NIK</a></li>
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
                <li>Input Data Kelurahan</li>
                <li>></li>
                <li>Cetak Surat</li>
            </ul>
        </nav>
        <article class="pilih-surat">
            <button id='surat-pengantar-button'>Surat Pengantar</button>
        </article>
        <article class="input-data-warga">
            <h2>Surat Pengantar</h2>
            <livewire:input-data-warga/>
        </article>
        <article class="input-data-kelurahan">
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
        </article>
    </main>
    <!-- Surat -->
    <div class="surat" style='display:inherit'>
        <header class='header-surat'>
            <h1>RUKUN TETANGGA 001 RUKUN WARGA XI</h1>
            <h1>KELURAHAN LOWOKWARU KECAMATAN LOWOKWARU</h1>
            <h1>KOTA MALANG</h1>
        </header>
        <main class='main-surat'>
            <article class="pembuka">
                <p>MALANG, 26 Agustus 2021</p>
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
                    <p class="nomor-surat">Nomor: 7 / 001-XI / VII 2021</p>
                    <p class="indent">Yang bertanda tangan di bawah ini Ketua RT 001 RW XI Kelurahan Lowokwaru Kecamatan Lowokwaru Kota Malang. Dengan ini menerangkan bahwa:</p>
                    <table class="data-warga">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>Laki-Laki / Perempuan</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl.Lahir</td>
                            <td>:</td>
                            <td></td>
                        </tr><tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td></td>
                        </tr><tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>Belum Kawin / Kawin / Cerai Hidup / Cerai Mati</td>
                        </tr><tr>
                            <td>Kewarganegaraan</td>
                            <td>:</td>
                            <td></td>
                        </tr><tr>
                            <td>Pendidikan</td>
                            <td>:</td>
                            <td></td>
                        </tr><tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td></td>
                        </tr><tr>
                            <td>Nomor NIK</td>
                            <td>:</td>
                            <td></td>
                        </tr><tr>
                            <td>Nomor Kartu Keluarga</td>
                            <td>:</td>
                            <td></td>
                        </tr><tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td></td>
                        </tr><tr>
                            <td>Keperluan</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </table>
                    <p class="indent">Demikian untuk menjadikan periksa dan dipergunakan sebagaimana mestinya.</p>
                    <table class="data-surat">
                        <tr>
                            <td>Nomor</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </table>
                </section>
                <section class="mengetahui">
                    <div class="rw">
                        <p>Mengetahui,</p>
                        <p>KETUA RW XI</p>
                        <p>KELURAHAN LOWOKWARU</p>
                        <img src='' class="tanda-tangan"></img>
                        <p class="nama">Vrizas Izza Izzuddin</p>
                    </div>
                    <div class="rt">
                        <p>Mengetahui,</p>
                        <p>KETUA RT 001</p>
                        <p>KELURAHAN LOWOKWARU</p>
                        <img src='' class="tanda-tangan"></img>
                        <p class="nama">Vrizas Izza Izzuddin</p>
                    </div>
                </section>
            </article>
        </main>
    </div>
    

    <script src="{{ asset('js/create-surat.js') }}"></script>
    @livewireScripts
</body>
</html>