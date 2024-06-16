<!DOCTYPE html>
<html>
<head>
    <title></title>

    <style>
        .bold {
            font-weight: 800;
        }
    </style>
</head>
<body>
    <h1>Message from site ({{ config('app.name', '') }})</h1>
    <div><span class="bold">Name:</span> {{ $content['name'] }}</div>
    <div><span class="bold">Email:</span> {{ $content['email'] }}</div>
    <p>{{ $content['body'] }}</p>
</body>
</html>