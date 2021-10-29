<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li ><a href="{{ url('/admin/data-aparat') }}">Aparat Terdaftar</a></li>
        </ul>
    </nav>
    

    <h1>Halaman Admin</h1>
    <h2>FORM HALAMAN REGISTER APARAT</h2>
    <div class ="from-tambah-aparat">
    
        <form action="{{ url('admin') }}" method="post" enctype ="multipart/form-data">
        @csrf
            <label for="nik">NIK</label>
            <input id="nik" type="text" name="nik">
            <label for="nama">Nama</label>
            <input id="nama" type="text" name="name">
            <label for="">Email</label>
            <input id="email" type="email" name="email">
            <label for="password">Password</label>
            <input id="password" type="password" name="password">
            <label for="jabatan">Jabatan</label>
            <input id="jabatan" type="text" name="jabatan">
            <label for="rt">RT</label>
            <input id="rt" type="text" name="rt">
            <label for="rw">RW</label>
            <input id="rw" type="text" name="rw">
            <button type="submit">Submit</button>
        </form>
        
    </div>
    
</body>
</html>