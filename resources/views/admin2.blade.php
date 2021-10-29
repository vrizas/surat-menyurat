<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>Jabatan</th>
            <th>RT</th>
            <th>RW</th>
        </tr>
        @foreach($aparats as $key => $aparat)
        <tr>
            <th>{{$aparat->id}}</th>
            <th>{{$aparat->jabatan}}</th>
            <th>{{$aparat->rt}}</th>
            <th>{{$aparat->rw}}</th>
        </tr>
        @endforeach
        

    </table>
</body>
</html>