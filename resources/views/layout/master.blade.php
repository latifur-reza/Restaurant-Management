<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.styles')
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/navbar.blade.php -->
    @include('partials.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/sidebar.blade.php -->
      @include('partials.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/footer.blade.php -->
        @include('partials.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  @include('partials.scripts')
  <!-- End custom js for this page-->
</body>

</html>
