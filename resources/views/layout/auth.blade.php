<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.styles')
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        @yield('content')
      
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  @include('partials.scripts')
  <!-- endinject -->
</body>

</html>
