<html>
@include('project_manager.layouts.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 @include('project_manager.layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
 @include('project_manager.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('project_manager.layouts.footer')
  @include('project_manager.layouts.alert')

</div>
<!-- ./wrapper -->

</body>
</html>
