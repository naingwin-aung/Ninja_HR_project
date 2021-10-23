<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    {{-- Custom Css --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    {{-- DateRangePicker --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @yield('extra_css')
</head>
<body>
    <div class="page-wrapper chiller-theme">
        <nav id="sidebar" class="sidebar-wrapper">
          <div class="sidebar-content">
            <div class="sidebar-brand">
              <a href="{{route('home')}}">Ninja HR</a>
              <div id="close-sidebar">
                <i class="fas fa-times"></i>
              </div>
            </div>
            <div class="sidebar-header">
              <div class="user-pic">
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                  alt="User picture">
              </div>
              <div class="user-info">
                <span class="user-name">Jhon
                  <strong>Smith</strong>
                </span>
                <span class="user-role">Administrator</span>
                <span class="user-status">
                  <i class="fa fa-circle"></i>
                  <span>Online</span>
                </span>
              </div>
            </div>
            <div class="sidebar-menu">
              <ul>
                <li>
                  <a href="{{route("employee.index")}}">
                    <i class="fa fa-users"></i>
                    <span>Employees</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- sidebar-menu  -->
          </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <div class="app_bar shadow">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="d-flex justify-content-between">
                        <a href="#" id="show-sidebar">
                            <i class="fas fa-bars"></i>
                        </a>
                        <h5 class="mb-0">@yield('title')</h5>
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
        <main class="">
            <main class="py-4">
              <div class="container">
                @yield('content')
              </div>
            </main>
        </main>
        <div class="bottom_bar shadow">
            <div class="d-flex justify-content-center">
                <div class="col-md-8 px-4">
                    <div class="d-flex justify-content-between">
                        <div class="text-center">
                            <a href="{{route("home")}}">
                                <i class="fas fa-home"></i>
                                <p class="mb-0">Home</p>
                            </a>
                        </div>
                        <div class="text-center">
                            <a href="">
                                <i class="fas fa-home"></i>
                                <p class="mb-0">Home</p>
                            </a>
                        </div>
                        <div class="text-center">
                            <a href="">
                                <i class="fas fa-home"></i>
                                <p class="mb-0">Home</p>
                            </a>
                        </div>
                        <div class="text-center">
                            <a href="">
                                <i class="fas fa-home"></i>
                                <p class="mb-0">Home</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-content" -->
      </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{asset('js/app.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    {{-- Datatables --}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    {{-- DateRangePicker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('script')
    <script>
        jQuery(function ($) {
          let token = document.head.querySelector('meta[name="csrf-token"]');

          if(token) {
            $.ajaxSetup({
              headers : {
                'X-CSRF-TOKEN' : token.content,
              }
            })
          }

          $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
                if ($(this).parent().hasClass("active")) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this).parent().removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this).next(".sidebar-submenu").slideDown(200);
                    $(this).parent().addClass("active");
                }
            });

            $("#close-sidebar").click(function(e) {
                e.preventDefault();
                $(".page-wrapper").removeClass("toggled");
                $("#show-sidebar").css('opacity', 1);
            });

            $("#show-sidebar").click(function(e) {
                e.preventDefault();
                $(".page-wrapper").addClass("toggled");
                $("#show-sidebar").css('opacity', 0);
            });

            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
            })

            @if(session('created')) 
              Toast.fire({
                icon: 'success',
                title: '{{session('created')}}'
              })
            @endif

            @if(session('updated')) 
              Toast.fire({
                icon: 'success',
                title: '{{session('updated')}}'
              })
            @endif
        });
    </script>
</body>
</html>
