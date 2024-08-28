<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('assets/css/nifty.min.css') }}" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ asset('assets/css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">
    {{-- Menu  --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!--=================================================-->
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ asset('assets/plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <!--Demo [ DEMONSTRATION ]-->
    {{-- ini aku hapuuus --}}
    <link href="{{ asset('assets/css/demo/nifty-demo.min.css') }}" rel="stylesheet">

    @yield('style')

    @include('layoutsAdmin.header')
    </head>
    <body>
      <div id="container">
        @include('layoutsAdmin.nav')
        <div class="boxed">
          @yield('content')
          @include('layoutsAdmin.sidebar')

        <footer id="footer">
          @include('layoutsAdmin.footer')
        </footer>
      </div>
      </div>
         <!--JAVASCRIPT-->
    <!--=================================================-->

    <script src="{{ asset('assets/plugins/morris-js/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris-js/raphael-js/raphael.min.js') }}"></script>
    <!--Morris.js Sample [ SAMPLE ]-->
    <script src="{{ asset('assets/js/demo/morris-js.js') }}"></script>
    <!--jQuery [ REQUIRED ]-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="{{ asset('assets/js/nifty.min.js') }}"></script>
	<script src="{{url('assets/js/components/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/plugins/flot-charts/jquery.flot.min.js') }}"></script>
  	<script src="{{ asset('assets/plugins/flot-charts/jquery.flot.resize.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>
    <!--Sparkline [ OPTIONAL ]-->
    <script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Specify page [ SAMPLE ]-->
    <script src="{{ asset('assets/js/demo/dashboard.js') }}"></script>
    {{-- Menu --}}
    <script src="{{ asset('assets/js/menu.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Ensure jQuery is loaded before DataTables -->
    <script>
        $(document).ready(function() {
            try {
                console.log("Initializing DataTable...");
                $('.table').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.13.5/i18n/Indonesian.json" // Optional: Set to Indonesian if needed
                    },
                    "order": [[0, 'asc']],
                    "responsive": true
                });
                console.log("DataTable initialized successfully.");
            } catch (error) {
                console.error("Error initializing DataTable:", error);
            }
        });
    </script>
    <!--=================================================-->
  </body>
</html>
