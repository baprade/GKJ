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
  "@id": "https://www.gkj-wonogiri.com/#church",
  "name": "GKJ Wonogiri",
  "alternateName": ["Gereja Kristen Jawa Wonogiri", "GKJ Wonogiri Induk"],
  "url": "https://www.gkj-wonogiri.com",
  "logo": "{{ route('images', config('app.logo')) }}",
  "image": "{{ route('images', config('app.image')) }}",
  "description": "{{ config('app.description', 'Gereja Kristen Jawa Wonogiri melayani persekutuan, kesaksian, dan pelayanan jemaat di Kabupaten Wonogiri, Jawa Tengah.') }}",
  "telephone": "+62-273-3201137",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Jl. Murtipranoto No. 92, Sanggrahan",
    "addressLocality": "Wonogiri",
    "addressRegion": "Jawa Tengah",
    "postalCode": "57612",
    "addressCountry": "ID"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": -7.8183,
    "longitude": 110.9255
  },
  "sameAs": [
    "https://www.youtube.com/@GKJWONOGIRI",
    "https://www.facebook.com/GerejaKristenJawaWonogiri/",
    "https://www.instagram.com/gkj_wonogiri/"
  ],
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Sunday",
      "opens": "07:00",
      "closes": "08:30"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Sunday",
      "opens": "16:30",
      "closes": "18:00"
    }
  ]
}
</script>
</head>
<body class="flex flex-col h-full lg:flex-row">
{{-- Top Progress Bar for Page Navigation --}}
<div id="top-progress-bar"></div>

<x-app.header-side/>
<div class="relative flex flex-col w-full h-full overflow-auto" id="main-content-scroll">
    {{-- Skeleton Shimmer Loading Placeholder during Livewire Navigation --}}
    <div id="page-skeleton-overlay">
        <div class="flex flex-col gap-6 p-6 sm:p-10 max-w-5xl mx-auto w-full">
            {{-- Header Skeleton --}}
            <div class="skeleton-shimmer h-10 w-2/5 mb-4"></div>
            {{-- Hero / Banner Skeleton --}}
            <div class="skeleton-shimmer h-56 sm:h-72 w-full mb-6"></div>
            {{-- Content Lines Skeleton --}}
            <div class="space-y-3">
                <div class="skeleton-shimmer h-4 w-full"></div>
                <div class="skeleton-shimmer h-4 w-5/6"></div>
                <div class="skeleton-shimmer h-4 w-4/6"></div>
            </div>
            {{-- Cards Grid Skeleton --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                <div class="skeleton-shimmer h-44 w-full"></div>
                <div class="skeleton-shimmer h-44 w-full"></div>
                <div class="skeleton-shimmer h-44 w-full"></div>
            </div>
        </div>
    </div>

    {{ $slot }}
    <div class="p-4 lg:hidden"><x-app.footer/></div>
</div>
@vite('resources/js/app.js')

<script>
    (function () {
        const progressBar = document.getElementById('top-progress-bar');
        const skeletonOverlay = document.getElementById('page-skeleton-overlay');
        let progressInterval = null;

        document.addEventListener('livewire:navigating', () => {
            if (progressBar) {
                progressBar.classList.add('active');
                progressBar.style.width = '15%';
                
                let width = 15;
                clearInterval(progressInterval);
                progressInterval = setInterval(() => {
                    if (width < 80) {
                        width += Math.random() * 15;
                        progressBar.style.width = width + '%';
                    }
                }, 100);
            }

            if (skeletonOverlay) {
                skeletonOverlay.classList.add('visible');
            }
        });

        document.addEventListener('livewire:navigated', () => {
            if (progressBar) {
                clearInterval(progressInterval);
                progressBar.style.width = '100%';
                setTimeout(() => {
                    progressBar.style.opacity = '0';
                    setTimeout(() => {
                        progressBar.classList.remove('active');
                        progressBar.style.width = '0%';
                        progressBar.style.opacity = '';
                    }, 300);
                }, 200);
            }

            if (skeletonOverlay) {
                skeletonOverlay.classList.remove('visible');
            }

            const mainScroll = document.getElementById('main-content-scroll');
            if (mainScroll) {
                mainScroll.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    })();
</script>
</body>
</html>
