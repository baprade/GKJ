<!DOCTYPE html>
<html class="h-full bg-slate-100 text-black/80" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('page_title', config('app.title'))</title>
<meta name="title" content="@yield('page_title', config('app.title'))"/>
<meta name="description" content="@yield('page_description', config('app.description'))">
<meta itemprop="name" content="@yield('page_title', config('app.title'))"/>
<meta itemprop="description" content="@yield('page_description', config('app.description'))"/>
<meta itemprop="image" content="@yield('page_image', asset('images/'.config('app.image')))"/>
<meta property="og:title" content="@yield('page_title', config('app.title'))"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{ request()->url() }}"/>
<meta property="og:image" content="@yield('page_image', asset('images/'.config('app.image')))"/>
<meta property="og:description" content="@yield('page_description', config('app.description'))"/>
<meta property="og:site_name" content="{{ config('app.title') }}"/>
<link rel="shortcut icon" href="{{ asset('images/'.config('app.icon')) }}" type="image/x-icon"/>
{{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@vite('resources/css/app.css')
</head>
{{-- style="background: url('{{ asset('images/bg-login.webp') }}') no-repeat center center; background-size: cover;" --}}
<body class="flex flex-col h-full">
{{ $slot }}
@vite('resources/js/app.js')
</body>
</html>
