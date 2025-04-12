<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistem</title>
    
    
    
   

  <link href="{{ asset('assets/compiled/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/compiled/css/app-dark.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/compiled/css/iconly.css') }}" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

  
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="main">
            <div class="app-wrapper">

                @include('admin.layout.header')
        
                @include('admin.layout.sidebar')
                <!-- End Navbar -->
        
                <main class="app-main">
                    @yield('content')
                </main>
        
                @include('admin.layout.footer')
            </div>
        </div>
    </div>
    
    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    <!-- jQuery dan DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Inisialisasi DataTable -->
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>

    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script>
    
    @yield('scripts')
</body>

</html>