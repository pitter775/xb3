<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="theme-color" content="#612400">
    <meta content="pitter775@gmail.com" name="author">
    <meta property="og:description" content="{{$titulopesq}}"/>
    <meta property="og:image" content="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/img/logowhats.jpg" />
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content="pt_BR"/> 

    <link rel="apple-touch-icon" sizes="76x76" href="">
    <link rel="icon" type="image/png" href="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/img/logop.png">

    <title> XB3 Soluções - Pesquisa </title>

    <!-- CSS Files -->
    <link href="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/icofont/icofont.min.css" rel="stylesheet" />
    <link href="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/venobox/venobox.css" rel="stylesheet" />
    <link href="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/aos/aos.css" rel="stylesheet" />
    <link href="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/md/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/css/style.css" rel="stylesheet" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-R3RDVZG5HK"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-R3RDVZG5HK');
    </script>

</head>
<body>
  <!-- ======= Header ======= -->


    @yield('content')


    <!-- Vendor JS Files -->
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/jquery/jquery.min.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/jquery/jquery-ui.min.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/jquery.easing/jquery.easing.min.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/waypoints/jquery.waypoints.min.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/counterup/counterup.min.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/venobox/venobox.min.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/owl.carousel/owl.carousel.min.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/aos/aos.js"></script>
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/md/mdb.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <!-- Template Main JS File -->
    <script src="https://xb3-laravel-qjay4m1bs-pitter775.vercel.app/js/main.js"></script>
    <!-- <script src="{{ asset('js') }}/whats.js"></script> -->
    <!-- <script defer async src='https://duz4dqsaqembt.cloudfront.net/client/whats.js'></script> -->

    @stack('scripts')
</body>
</html>