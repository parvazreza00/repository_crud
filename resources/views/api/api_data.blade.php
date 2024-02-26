<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,td,table{
            border: 1px solid black;
            border-collapse:collapse;
        }
    </style>
</head>
<body>
<h1>Fetch external pai data in Laravel</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>userId</th>
            <th>Title</th>
            <th>Body</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $data)
        <tr>
            <td>{{$data['id']}}</td>
            <td>{{$data['userId']}}</td>
            <td>{{$data['title']}}</td>
            <td>{{$data['body']}}</td>
        </tr>
        @endforeach
    </tbody>
   
</table>
</body>
</html>m