<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ferdi</title>
    <link rel="stylesheet" href="{{asset('student/assets_new/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('student/assets_new/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('student/assets_new/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('student/assets_new/css/fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('student/assets_new/css/swiper-min.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@6.6.2/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('student/assets_new/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css')}}">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/css/bootstrap-select.min.css">
        @yield('pageSpecificCss')
  
  @stack('styles')
  {{-- NICedit CDN --}}
  @stack('nicedit-scripts')
