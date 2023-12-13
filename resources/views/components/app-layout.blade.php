<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="robots" content="index, follow"/>
		<meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
	  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
	  <meta name="csrf-token" content="{{ csrf_token() }}"/>
	  <meta name="grecaptcha-key" content="{{ env('GOOGLE_RECAPTCHA_CLIENT_KEY') }}"/>
	 	<meta name="description" content="{{ $description }}" />
		<meta name="abstract" content="Online Application of Golden Minds Colleges"  />
	  <meta name="copyright" content="Golden Minds Bulacan"  />
	  <meta name='Classification' content='Education'/>
	  <meta name='identifier-URL' content='{{ url()->current() }}'/>
	  <meta name="msapplication-TileImage" content="{{ asset('/favicon.png') }}" />
	  <!--<meta author='Jerome Avecilla' content='Developer: https://javecilla.vercel.app'/>-->
	  <!--The SEO Framework by Jerome Avecilla -->
	  <meta property="article:author" content="https://www.facebook.com/gmcstamaria2015"/>
	  <meta property="article:publisher" content="https://www.facebook.com/gmcstamaria2015"/>
	  <meta property="og:image" content="{{ asset('/ogimage.png') }}" />
	  <meta property="og:image:width" content="608">
	  <meta property="og:image:height" content="260">
	  <meta property="og:image:alt" content="Golden Minds Colleges" />
	  <meta property="og:image:secure_url" content="{{ asset('/favicon.png') }}"/>
	  <meta property="og:locale" content="en_US">
	  <meta property="og:type" content="website">
	 	<meta property="og:title" content="@isset($title) {{ $title }} | @endisset Golden Minds Bulacan" />
	  <meta property="og:description" content="test" />
	  <meta property="og:url" content="{{ url()->current() }}" />
	  <meta property="og:site_name" content="Golden Minds Bulacan"/>
	 	{{--  <meta name="recaptcha-key" content="{{ env('RECAPTCHA_FRONTEND_KEY') }}"/> --}}
	  <title>@isset($title) {{ $title }} | @endisset {{ __('Golden Minds Bulacan') }}</title>
	  {{-- Favicon --}}
		<link rel="shortcut icon" type="image/png" sizes="16x16" href="{{ asset('/favicon.png') }}" />
		<link rel="apple-touch-icon" type="image/png" sizes="16x16"  href="{{ asset('/favicon.png') }}" />
		{{-- Google Fonts --}}
		<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin/>
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@500&display=swap" defer/>
	  {{-- Library and plugin css and js links --}}
	  <link rel="stylesheet" href="{{ asset('/global/assets/libs/bootstrap@5.3.2/css/bootstrap.min.css') }}"/>
	  <link rel="stylesheet" href="{{ asset('/global/assets/libs/fontawesome@6.0/css/all.min.css') }}"/>
	  <link rel="stylesheet" href="{{ asset('/global/assets/libs/sweetalert2@11/dist/sweetalert2.min.css') }}"/>
	  <link rel="stylesheet" href="{{ asset('/global/assets/libs/toastr/toastr.min.css') }}"/>
	  <script src="{{ asset('/global/assets/libs/jquery@3.7.1/jquery.min.js') }}" type="text/javascript"></script>
	  {{-- Custom css links --}}
	  <link rel="stylesheet" href="{{ asset('/global/assets/custom/stylesheets/app.css?v=1.0') }}"/>
	  {{-- reCaptcha API Library --}}
	  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
{{-- 	  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer></script> --}}
  </head>
  <body>
	  {{-- Header --}}
		<x-header id="header">
	  	<div class="h_container">
	    	<x-app-container>
	      	<div class="row">
		        {{-- Contact --}}
		        <div class="col-md-6 d-none d-lg-inline ">
		          <div class="d-flex">
		            <a href="tel:+639394499844" class="d-none d-lg-inline h_links">
		              <small><i class="fa-solid fa-phone"></i>&nbsp;
		              	{{ __('(+63) 939 449 9844')}}
		              </small>
		            </a>&nbsp;&nbsp;&nbsp;
		            <a href="mailto:admission@goldenmindsbulacan.com" class="ml-10 d-none d-lg-inline h_links">
		              <small><i class="fa-solid fa-envelope"></i>&nbsp;
		              	{{ __('admission@goldenminds.edu.ph')}}
		              </small>
		            </a>
		          </div>
		        </div>
		        {{-- Social --}}
		        <div class="col-md-6 d-flex justify-content-center justify-content-md-end align-items-center">
		          <div class="d-flex">
		            <a href="https://www.facebook.com/gmcstamaria2015" target="_blank"
		            	class="h_links">
		              <small><i class="fa-brands fa-facebook-f"></i></small>
		            </a>&nbsp;&nbsp;
		            <a href="https://www.youtube.com/@goldenmindscolleges7588" target="_blank"
		            	class="ml-10 h_links">
		              <small><i class="fa-brands fa-youtube"></i></small>
		            </a>&nbsp;&nbsp;
		            <span class="ml-10">
		              <small><i class="fa-brands fa-linkedin-in"></i></small>
		            </span>&nbsp;&nbsp;
		            <a href="mailto:info@goldenmindsbulacan.com"
		            	class="d-lg-none ml-10 h_links">
		              <small><i class="fa-solid fa-envelope"></i></small>
		            </a>&nbsp;&nbsp;
		            <a href="tel:+639394499844"
		            	class="d-lg-none ml-10 h_links">
		              <small><i class="fa-solid fa-phone"></i></small>
		            </a>
		          </div>
		        </div>
	      	</div>
	    	</x-app-container>
	  	</div>
		</x-header>
		{{-- Hero card --}}
		<x-section class="bg-white mb-3 ">
	  	<img src="{{ asset('/global/assets/images/header6.PNG') }}"
	  		class="card-img-top" alt="header" loading="lazy"/>
		</x-section>
		{{-- Main --}}
	  <x-main>
	    {{ $slot }}
	  </x-main>
	  {{-- Library and plugin js links --}}
	  <script src="{{ asset('/global/assets/libs/bootstrap@5.3.2/js/bootstrap.bundle.min.js') }}"></script>
	  <script src="{{ asset('/global/assets/libs/fontawesome@6.0/js/all.min.js') }}"></script>
	  <script src="{{ asset('/global/assets/libs/sweetalert2@11/dist/sweetalert2.all.min.js') }}"></script>
	  <script src="{{ asset('/global/assets/libs/toastr/toastr.min.js') }}"></script>
	  {{-- Custom Scripts --}}
	  <script src="{{ asset('/global/assets/custom/scripts/helper.js?v=1.0') }}"></script>
	  <script src="{{ asset('/global/assets/custom/scripts/formValidations.js?v=1.0') }}"></script>
	  <script src="{{ asset('/global/assets/custom/scripts/app.js?v=1.0') }}"></script>
  </body>
</html>
