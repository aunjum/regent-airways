<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Evil Event Occured!</h2>

<div>
    <span><strong>Host: </strong>{{url('/')}}</span><br>
    <span><strong>Time: </strong>{{$timestamp}}</span><br>
    <span><strong>User: </strong>{{$user}}</span><br>
    <span><strong>URI: </strong>{{$uri_link}}</span><br>
    <span><strong>Client IP: </strong>{{$client_ip}}</span><br>
</div>
</body>
</html>
