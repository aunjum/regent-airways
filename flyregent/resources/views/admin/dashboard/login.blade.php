<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Regent Airways Admin</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>
    <!--todo:sts changes-->
    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/js/bootstrap/dist/css/bootstrap.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{asset('public/fonts/font-awesome-4/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('public/css/style.css') }}" rel='stylesheet' type='text/css'>

</head>

<body class="texture">

<div id="cl-wrapper" class="login-container">

    <div class="middle-login">
        <div class="block-flat">
            <div class="header">
                <h3 class="text-center"><img class="logo-img" src="{{ URL::to('/') }}/public/images/logo.png" alt="logo"/></h3>
            </div>
            <div>
                <div class="content">
                    @if (isset($errorMessages))
                        <div class="alert alert-danger alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <div class="icon"><i class="fa fa-times-circle"></i></div>
                            <strong>Error!</strong> {{ $errorMessages }}.
                        </div>
                    @endif
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-white rounded">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <div class="icon"><i class="fa fa-times-circle"></i></div>
                                <strong>Error!</strong> {{ $error }}.
                            </div>
                        @endforeach
                    @endif
                    {{ Form::open(array('url' => '/admin/login-users', 'method' => 'post', 'style' => 'margin-bottom: 0px !important;', 'class' => 'form-horizontal')) }}
                        <h4 class="title">Login Access</h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" placeholder="Username" id="username" class="form-control" required name="userName">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" placeholder="Password" id="password" class="form-control" required name="password">
                                </div>
                            </div>
                        </div>
            </div>
                <div class="foot">
                    <button class="btn btn-primary" data-dismiss="modal" type="submit">Log me in</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="text-center out-links"><a href="#">&copy; {{date('Y')}} Regent Airways.</a> Maintained By <a href="http://stsbd.com" target="_blank">ST Solutions</a> </div>
    </div>
</div>
<script type='text/javascript' src="{{asset('public/js/jquery.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/behaviour/general.js') }}"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type='text/javascript' src="{{asset('public/js/behaviour/voice-commands.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/jquery.flot/jquery.flot.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/jquery.flot/jquery.flot.pie.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/jquery.flot/jquery.flot.resize.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/jquery.flot/jquery.flot.labels.js') }}"></script>

</body>
</html>