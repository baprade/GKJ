<!DOCTYPE html>
<html class="h-full text-black bg-white nunito-sans" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('page_title', config('app.title'))</title>
<meta name="title" content="@yield('page_title', config('app.title'))"/>
<meta name="description" content="@yield('page_description', config('app.description'))">
<meta itemprop="name" content="@yield('page_title', config('app.title'))"/>
<meta itemprop="description" content="@yield('page_description', config('app.description'))"/>
<meta itemprop="image" content="@yield('page_image', route('images', config('app.image')))"/>
<meta property="og:title" content="@yield('page_title', config('app.title'))"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{ request()->url() }}"/>
<meta property="og:image" content="@yield('page_image', route('images', config('app.image')))"/>
<meta property="og:description" content="@yield('page_description', config('app.description'))"/>
<meta property="og:site_name" content="{{ config('app.title') }}"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="@yield('page_title', config('app.title'))"/>
<meta name="twitter:description" content="@yield('page_description', config('app.description'))"/>
<meta name="twitter:image" content="@yield('page_image', route('images', config('app.image')))"/>
<link rel="shortcut icon" href="{{ route('images', config('app.logo')) }}" type="image/x-icon"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="canonical" href="{{ str_replace('https://gkj-wonogiri.com', 'https://www.gkj-wonogiri.com', request()->url()) }}">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wdth,wght,YTLC@0,6..12,75..125,200..1000,440..540;1,6..12,75..125,200..1000,440..540&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<script src="{{ asset('js/uikit.min.js') }}"></script>
<script src="{{ asset('js/uikit-icons.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
@vite('resources/css/app.css')

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Church",
  "name": "{{ config('app.title', 'GKJ Wonogiri') }}",
  "alternateName": "Gereja Kristen Jawa Wonogiri",
  "url": "https://www.gkj-wonogiri.com",
  "logo": "{{ route('images', config('app.logo')) }}",
  "image": "{{ route('images', config('app.image')) }}",
  "description": "{{ config('app.description', 'Gereja Kristen Jawa Wonogiri melayani persekutuan, kesaksian, dan pelayanan jemaat di Kabupaten Wonogiri, Jawa Tengah.') }}",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Wonogiri",
    "addressRegion": "Jawa Tengah",
    "addressCountry": "ID"
  }
}
</script>
</head>
<body class="flex flex-col h-full lg:flex-row">
{{-- uk-scrollspy="target: .scrollspy; delay: 200;" --}}
{{-- <div wire:loading class="flex items-center justify-center h-full"><span uk-spinner="ratio: 3"></span></div> --}}
<x-app.header-side/>
<div class="flex flex-col w-full h-full overflow-auto">
{{ $slot }}
<div class="p-4 lg:hidden"><x-app.footer/></div>
</div>
@vite('resources/js/app.js')
</body>
</html>
