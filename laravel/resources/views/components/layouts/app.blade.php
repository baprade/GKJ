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
<style>
/* --- Sleek Navigation Progress Bar (Anti-UI Slop) --- */
#top-progress-bar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    width: 0%;
    background: linear-gradient(90deg, #1e293b 0%, #d97706 50%, #f59e0b 100%);
    z-index: 999999;
    box-shadow: 0 0 12px rgba(217, 119, 6, 0.8);
    pointer-events: none;
    transition: width 0.2s ease, opacity 0.3s ease;
    opacity: 0;
}

#top-progress-bar.active {
    opacity: 1 !important;
}

/* --- Skeleton Shimmer Loading Overlay --- */
#page-skeleton-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    min-height: 100vh;
    background: rgba(255, 255, 255, 0.94);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    z-index: 100;
    display: none;
    pointer-events: none;
}

#page-skeleton-overlay.visible {
    display: block !important;
}

@keyframes pulse-shimmer {
    0% {
        background-position: -200% 0;
    }
    100% {
        background-position: 200% 0;
    }
}

.skeleton-shimmer {
    background: linear-gradient(90deg, #f1f5f9 25%, #e2e8f0 50%, #f1f5f9 75%);
    background-size: 200% 100%;
    animation: pulse-shimmer 1.4s infinite ease-in-out;
    border-radius: 6px;
}
</style>
</head>
<body class="flex flex-col h-full lg:flex-row">
{{-- Top Progress Bar for Page Navigation --}}
<div id="top-progress-bar"></div>

<x-app.header-side/>
<div class="relative flex flex-col w-full h-full overflow-auto" id="main-content-scroll">
    {{-- Skeleton Shimmer Loading Placeholder during Livewire Navigation --}}
    <div id="page-skeleton-overlay">
        <div class="flex flex-col w-full max-w-5xl gap-6 p-6 mx-auto sm:p-10">
            {{-- Header Skeleton --}}
            <div class="w-2/5 h-10 mb-2 skeleton-shimmer"></div>
            {{-- Hero / Banner Skeleton --}}
            <div class="w-full h-48 mb-4 skeleton-shimmer sm:h-64"></div>
            {{-- Content Lines Skeleton --}}
            <div class="space-y-3">
                <div class="w-full h-4 skeleton-shimmer"></div>
                <div class="w-5/6 h-4 skeleton-shimmer"></div>
                <div class="w-4/6 h-4 skeleton-shimmer"></div>
            </div>
            {{-- Cards Grid Skeleton --}}
            <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="w-full h-40 skeleton-shimmer"></div>
                <div class="w-full h-40 skeleton-shimmer"></div>
                <div class="w-full h-40 skeleton-shimmer"></div>
            </div>
        </div>
    </div>

    {{ $slot }}
    <div class="p-4 lg:hidden"><x-app.footer/></div>
</div>
@vite('resources/js/app.js')

<script>
    (function () {
        let progressInterval = null;

        function startNavLoading() {
            const progressBar = document.getElementById('top-progress-bar');
            const skeletonOverlay = document.getElementById('page-skeleton-overlay');

            if (progressBar) {
                progressBar.classList.add('active');
                progressBar.style.opacity = '1';
                progressBar.style.width = '25%';

                let width = 25;
                clearInterval(progressInterval);
                progressInterval = setInterval(() => {
                    if (width < 85) {
                        width += Math.random() * 12;
                        progressBar.style.width = width + '%';
                    }
                }, 100);
            }

            if (skeletonOverlay) {
                skeletonOverlay.classList.add('visible');
            }
        }

        function endNavLoading() {
            const progressBar = document.getElementById('top-progress-bar');
            const skeletonOverlay = document.getElementById('page-skeleton-overlay');

            if (progressBar) {
                clearInterval(progressInterval);
                progressBar.style.width = '100%';
                setTimeout(() => {
                    progressBar.style.opacity = '0';
                    setTimeout(() => {
                        progressBar.classList.remove('active');
                        progressBar.style.width = '0%';
                        progressBar.style.opacity = '';
                    }, 250);
                }, 150);
            }

            if (skeletonOverlay) {
                skeletonOverlay.classList.remove('visible');
            }

            const mainScroll = document.getElementById('main-content-scroll');
            if (mainScroll) {
                mainScroll.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        // Livewire 3 Navigation lifecycle events
        document.addEventListener('livewire:navigating', startNavLoading);
        document.addEventListener('livewire:navigated', endNavLoading);

        // Fallback for click on [wire\:navigate] links for instant feedback
        document.addEventListener('click', (e) => {
            const link = e.target.closest('a[wire\\:navigate]');
            if (link && link.getAttribute('href') && !link.getAttribute('href').startsWith('#')) {
                startNavLoading();
            }
        });
    })();
</script>
</body>
</html>
