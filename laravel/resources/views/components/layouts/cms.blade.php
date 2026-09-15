<!DOCTYPE html>
<html class="h-full bg-white text-black/80 nunito-sans" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<link rel="shortcut icon" href="{{ route('images', config('app.logo')) }}" type="image/x-icon"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{-- <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet"> --}}
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wdth,wght,YTLC@0,6..12,75..125,200..1000,440..540;1,6..12,75..125,200..1000,440..540&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

{{-- @if (request()->routeIs('cms-posts-create') || request()->routeIs('cms-posts-edit')) --}}
<link rel="stylesheet" href="{{ asset('css/summernote-lite.0818.min.css') }}"/>
<script src="{{ asset('js/summernote-lite.0818.min.js') }}"></script>
<script src="{{ asset('js/summernote-pagebreak.js') }}"></script>
{{-- @endif --}}

<link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> --}}
<script src="{{ asset('js/uikit.min.js') }}"></script>
<script src="{{ asset('js/uikit-icons.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('css/cms.css') }}"/>
@vite('resources/css/app.css')
</head>
<body class="flex h-full bg-slate-100">
<div wire:loading class="flex items-center justify-center h-full"><span uk-spinner="ratio: 3"></span></div>
@auth
<x-cms.aside/>
@endauth
<div class="flex flex-col overflow-y-auto grow">
@auth
    <x-cms.header/>
@endauth
    {{ $slot }}
@auth
    <x-cms.footer/>
@endauth
</div>
@vite('resources/js/app.js')
</body>
</html>
