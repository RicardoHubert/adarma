<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Adarma Mandiri - Dashboard Admin</title>
  <link rel="icon" type="image/x-icon" href="
  @if (isset($landingpage->img_logo))
      {{ asset('storage/' . $landingpage->img_logo) }}
  @else
      {{ asset('images/logo.png') }}
  @endif
  ">
  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/jquery-bar-rating/fontawesome-stars-o.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/jquery-bar-rating/fontawesome-stars.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('vendors/css/style.css') }}">
  <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left py-3">
                            <div class="mb-3 d-flex">
                                <a href="{{ url('/') }}">
                                    <img src="
                                    @if (isset($landingpage->img_logo))
                                        {{ asset('storage/' . $landingpage->img_logo) }}
                                    @else
                                        {{ asset('images/logo.png') }}
                                    @endif
                                    " width="50" height="50" alt="logo">
                                </a>
                                <div class="ml-3">
                                    <h5 class="font-weight-bold text-black">CV. Arta Mandiri</h5>
                                    <p class="text-sm text-black">Agricultural And Industrial Export Company</p>
                                </div>
                            </div>

                            @yield('content')

                        </div>
                    </div>
                    <div class="col-lg-6 d-flex flex-row" style="background-image: url(@if (isset($landingpage->img_landing)) 
                            {{ 'storage/' . $landingpage->img_landing }}
                        @else    
                            'images/img landing page.png'
                        @endif);">
                        <!-- container-scroller -->

                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; {{ date("Y") }}  All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- base:js -->
    <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('vendors/js/off-canvas.js') }}"></script>
    <script src="{{ asset('vendors/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('vendors/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('vendors/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>