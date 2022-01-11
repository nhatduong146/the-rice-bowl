<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    .avaUser{
        padding: 0.25rem;
        background-color: #fff;
        border: 0px solid #dee2e6;
        border-radius: 75.25rem;
        /* max-width: 8%; */
        width: 88px;
        height: 88px;
    }
</style>
<body>
    @foreach ($list_evas as $eva)
    <img class="avaUser" src="{{asset($eva->avatar)}}" alt="..." class="img-thumbnail">
        <h1>{{ $eva->fullName }}</h1>
        <h2>{{ $eva->createdDate }}</h2>
    @endforeach
</body>
</html>

