<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Menyurat</title>
    <link rel="stylesheet" href="{{ asset('css/download-buku-register.css') }}">
</head>
<body>
    <h2>Buku Register</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>No. Register RW</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Keperluan</th>
        </tr>
        @foreach($reports as $report)
        <tr>
            <td>{{$report->no}}</td>
            <td>{{$report->noRegisterRw}}</td>
            <td>{{$report->nama}}</td>
            <td>{{$report->tanggal}}</td>
            <td>{{$report->keperluan}}</td>
        </tr>
        @endforeach
    </table>
</main>
</body>
</html>