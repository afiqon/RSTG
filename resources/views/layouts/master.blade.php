<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>RSTG </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('/node_modules/admin-lte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/node_modules/admin-lte/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/iCheck/all.css')}}">
  
     <link href="{{ asset('/node_modules/admin-lte/dist/css/skins/skin-purple.min.css')}}" rel="stylesheet" type="text/css" />

  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/datepicker/datepicker3.css') }}">

  <!-- DateTime Picker -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE/dist/css/AdminLTE.min.css') }}">

{!! Html::script('js/jquery.dataTables.min.js')!!}


    <![endif]-->
    <style type="text/css">
.popover{
    max-width: 30%; // Max Width of the popover (depending on the container!)
    max-height: 1000px;

}
.content-wrapper,
.right-side {
background-color: #ffffff;
}
    </style>
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ]) !!};
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    </script>
<!--     <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script> -->
  
    
    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->


    
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    @include('layouts.header2')

    <!-- Sidebar -->
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('title')
            <!-- <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1> -->
            <!-- You can dynamically generate breadcrumbs here -->
            <!--<ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
          
            @yield('content')
            
            <!--Modal dialog: Profil Saya-->

            
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
   

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<!--<script src="{{ asset ('/node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>-->
<!-- Bootstrap 3.3.2 JS -->

<!-- <script src="{{ asset ('/node_modules/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> -->
<!-- AdminLTE App -->
<script src="{{ asset ('/node_modules/admin-lte/dist/js/app.min.js') }}" type="text/javascript"></script>
 
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
  $(this).next('ul').toggle();
  e.stopPropagation();
  e.preventDefault();
  });
});



</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>