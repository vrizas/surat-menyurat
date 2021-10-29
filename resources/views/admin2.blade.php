<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="flex-container">
        <nav class="navbar">
            <ul>
                <li ><a href="{{ url('/admin/register') }}">Daftarkan Aparat</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn-logout"><i class='bx bx-log-out'></i>Keluar</button>
                    </form>
                </li>
            </ul>
        </nav>
        <main>
            <table>
                <tr>
                    <th>id</th>
                    <th>Jabatan</th>
                    <th>RT</th>
                    <th>RW</th>
                </tr>
                @foreach($aparats as $key => $aparat)
                <tr>
                    <td>{{$aparat->id}}</td>
                    <td>{{$aparat->jabatan}}</td>
                    <td>{{$aparat->rt}}</td>
                    <td>{{$aparat->rw}}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </div>
</body>
</html>