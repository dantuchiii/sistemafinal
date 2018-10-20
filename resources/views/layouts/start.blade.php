<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Blank Page</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('sbadmin/vendor/bootstrap/css/boots2.css') }}" rel="stylesheet"> 
    
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin/css/sb-admin.css') }}" rel="stylesheet">
    
    <!-- Custom styles for this esa-->
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
   

  </head>

  <body id="page-top">

    @include('layouts.fragment.navbar')

    <div id="wrapper">

      @include('layouts.fragment.side')

      <div id="content-wrapper">

        <div class="container-fluid">

          @yield('content')

        </div>
        <!-- /.container-fluid -->

        @include('layouts.fragment.footer')

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin/js/sb-admin.min.js')}}"></script>
    
    <script src="{{ asset('js/dropdownshow.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    
    
    
    @if(session()->has('info'))
        <script> 
        toastr.options.closeButton = true;
        toastr.options.positionClass = "toast-top-center";
        toastr.options.newestOnTop = true;
        toastr.info("{{ session('info') }}") 
        </script>
    @elseif(session()->has('success'))
        <script>
        toastr.options.closeButton = true; 
        toastr.options.positionClass = "toast-top-center";
        toastr.options.newestOnTop = true;
        toastr.success("{{ session('success') }}") 
        </script>
    @elseif(session()->has('error'))
        <script> 
        toastr.options.closeButton = true;
        toastr.error("{{ session('error') }}") 
        </script>
    @elseif(session()->has('warning'))
        <script> 
        toastr.options.closeButton = true;    
        toastr.warning("{{ session('warning') }}") 
        </script>   
    @endif                 
    
  </body>

</html>
