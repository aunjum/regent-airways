<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--todo:sts changes-->
    <link rel="shortcut icon" href="{{asset('public/images/favicon.png') }}">
    <title>Regent Airways::Admin Panel</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>


    <!-- Bootstrap core CSS -->
    <!--todo:sts changes-->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/css/bootstrap.min.css
" rel='stylesheet' type='text/css'>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
     <link href="https://cdn.jsdelivr.net/gh/jboesch/Gritter@1.7.4/css/jquery.gritter.css" rel='stylesheet' type='text/css'>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.7.4/nanoscroller.min.css" rel='stylesheet' type='text/css'>
     <link href="{{asset('public/js/jquery.easypiechart/jquery.easy-pie-chart.css') }}" rel='stylesheet' type='text/css'>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/css/bootstrap-switch.css" rel='stylesheet' type='text/css'>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.0/css/bootstrap-datetimepicker.min.css" rel='stylesheet' type='text/css'>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.css" rel='stylesheet' type='text/css'>
     <link href="{{asset('public/js/jquery.datatables/bootstrap-adapter/css/datatables.css') }}" rel='stylesheet' type='text/css'>
     <link href="{{asset('public/js/bootstrap.slider/css/slider.css') }}" rel='stylesheet' type='text/css'>
            <!-- Custom styles for this template -->
    <link href="{{asset('public/css/style.css') }}" rel='stylesheet' type='text/css'>

</head>
<body>

<!-- Fixed navbar -->
@include('admin/layout/head-bar')
<!-- End Fixed navbar -->
<div id="cl-wrapper" class="fixed-menu">
    <!-- Side Bar -->
    @include('admin/layout/side-bar')
    <!-- End Side Bar -->
    <!-- Main Content -->
    @yield('content')
    <!-- End Main Content -->
</div>






<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript' src="https://cdn.jsdelivr.net/gh/jboesch/Gritter@1.7.4/js/jquery.gritter.min.js"></script>

<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
<script type='text/javascript' src="{{asset('public/js/ckeditor/ckeditor.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/ckeditor/adapters/jquery.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/bootstrap.summernote/dist/summernote.min.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/bootstrap.wysihtml5/lib/js/wysihtml5-0.3.0.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js') }}"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.7.4/jquery.nanoscroller.min.js"></script>
<script type='text/javascript' src="{{asset('public/js/behaviour/general.js') }}"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script type='text/javascript' src="{{asset('public/js/jquery.easypiechart/jquery.easy-pie-chart.js') }}"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/js/bootstrap-switch.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.0/js/bootstrap-datetimepicker.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/skycons/1396634940/skycons.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/0.6.0/intro.min.js"></script>
<script type='text/javascript' src="{{asset('public/js/bootstrap.slider/js/bootstrap-slider.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/jquery.datatables/jquery.datatables.min.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/jquery.datatables/bootstrap-adapter/js/datatables.js') }}"></script>
<script type='text/javascript' src="{{asset('public/js/regentscript.js') }}"></script>

{{--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>--}}

<!-- Bootstrap core JavaScript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript">
    //Add dataTable Functions

    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dashBoard();
        App.dataTables('userDatatable');
        App.dataTables('pagesDatatable');
        App.dataTables('roleDatatable');
        App.textEditor();

    });
    
//    $(document).ready(function () {
//        setInterval(function () {
//                $.ajax({
//                    type: "POST",
//                    url: "http://devsxpress.com/regentairways/get_chat_not",
////                    data: "type=all",
//                    cache: false,
//                    success: function (result) {
//                        if(result != ''){
//                        $( ".notification" ).show();
//                        $( ".notification" ).html(result);
//                    }
//                    }
//                });
//
//        }, 5000);
//    });
    
    
</script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
//        App.init();
//        App.textEditor();

        $('#some-textarea').wysihtml5();
        $('#summernote').summernote();
    });
</script>

<script type='text/javascript' src="{{asset('public/js/behaviour/voice-commands.js') }}"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.1/jquery.flot.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.1/jquery.flot.pie.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.1/jquery.flot.resize.min.js"></script>
<script type='text/javascript' src="{{asset('public/js/jquery.flot/jquery.flot.labels.js') }}"></script>
@yield('extraScript')
</body>
</html>