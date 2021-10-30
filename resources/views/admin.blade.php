<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Admin Butuh Surat</title>
</head>
<body>
    <div class="flex-container">
        <nav class="navbar">
            <ul>
                <li ><a href="{{ url('/admin') }}">Aparat Terdaftar</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn-logout"><i class='bx bx-log-out'></i>Keluar</button>
                    </form>
                </li>
            </ul>
        </nav>
        <main>
            <h2>Halaman Admin</h2>
            <h3>FORM HALAMAN REGISTER APARAT</h3>
            <div class ="from-tambah-aparat">            
                <form action="{{ url('admin') }}" method="post" enctype ="multipart/form-data">
                @csrf
                    <label for="nik">NIK</label>
                    <input id="nik" type="text" name="nik" required>
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" name="name" required>
                    <label for="">Email</label>
                    <input id="email" type="email" name="email" required>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                    <label for="jabatan">Jabatan</label>
                    <input id="jabatan" type="text" name="jabatan" required>
                    <label for="rt">RT</label>
                    <input id="rt" type="text" name="rt" required>
                    <label for="rw">RW</label>
                    <input id="rw" type="text" name="rw" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>