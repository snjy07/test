<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    </noscript>
    <link href="{{ asset('front/css/font-awesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('front/css/mdb.min.css')}}" rel="stylesheet">
    <link href="{{ asset('front/css/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('front/css/main.css')}}" rel="stylesheet">
    <noscript>
      <style type="text/css">
        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }
      </style>
    </noscript>
  </head>
<body>

    <div class="page-content">
        <div class="container">
            @yield('page-part')
        </div>
    </div>

    <footer class="pt-4 pb-4 text-muted text-center d-print-none">
        <div class="container">
          <div class="my-3">
            <div class="h4">Sanjay Adhikari</div>
            <div class="footer-nav">
              <nav role="navigation">
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a class="nav-link" href="https://twitter.com/snjy07" title="Twitter"><i class="fab fa-twitter"></i><span class="menu-title sr-only">Twitter</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/snjy07" title="Facebook"><i class="fab fa-facebook"></i><span class="menu-title sr-only">Facebook</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://in.linkedin.com/in/sanjay-adhikari-451b6012b" title="linkedin"><i class="fab fa-linkedin"></i><span class="menu-title sr-only">Linkedin</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://github.com/snjy07" title="Github"><i class="fab fa-github"></i><span class="menu-title sr-only">Github</span></a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </footer>
      <script src="{{ asset('front/scripts/mdb.min.js') }}"></script>
      <script src="{{ asset('front/scripts/aos.js') }}"></script>
      <script src="{{ asset('front/scripts/main.js') }}"></script>
</body>
</html>
