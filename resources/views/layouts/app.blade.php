<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @yield('meta')
    <title>@yield('title', 'Astem Otomasyon')</title>
    <meta name="description" content="@yield('meta_description', 'Astem Otomasyon – Elektrik malzemeleri ve otomasyon ürünleri.')">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:site_name" content="Astem Otomasyon">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', $pageTitle ?? 'Astem Otomasyon')">
    <meta property="og:description" content="@yield('og_description', $metaDescription ?? 'Astem Otomasyon – Elektrik malzemeleri.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.png'))">
    <meta property="og:locale" content="tr_TR">

    @yield('og_tags')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 antialiased">

    <!-- Header -->
    <header x-data="{ open: false }" class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50 mt-4 mb-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo -->
                <a href="/" class="flex items-center gap-2 shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Astem Otomasyon" class="w-auto" style="height: 56px; max-height: 56px;">
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-4">
                    <!-- Arama Formu -->
                    <form method="GET" action="/arama" class="flex items-center">
                        <input type="text" name="q"
                               placeholder="Ürün ara..."
                               class="border border-gray-300 rounded-l-lg px-4 h-10 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] w-40 md:w-56">
                        <button type="submit"
                                class="bg-[#1e3a5f] hover:bg-[#162d4a] text-white h-10 px-4 rounded-r-lg text-sm transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#1e3a5f]"
                                aria-label="Ürün ara">
                            <svg class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </form>

                    <a href="/iletisim"
                       class="text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 px-4 h-10 inline-flex items-center rounded-md transition-colors">
                        İletişim
                    </a>
                </nav>

                <!-- Mobile Hamburger -->
                <button @click="open = !open"
                        class="md:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none"
                        aria-label="Menüyü aç/kapat">
                    <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden border-t border-gray-200 bg-white">
            <div class="px-4 py-3 space-y-1">
                <a href="/arama"
                   class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-orange-500 hover:bg-orange-50">
                    Ürün Ara
                </a>
                <a href="/iletisim"
                   class="block px-3 py-2 rounded-md text-sm font-medium text-white bg-orange-500 hover:bg-orange-600">
                    İletişim
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#1e3a5f] text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div>
                    <img src="{{ asset('images/logo-1.png') }}" alt="Astem Otomasyon" class="w-auto mb-3" style="height: 56px; max-height: 56px;">
                    <p class="text-sm text-blue-200 leading-relaxed">
                        Elektrik malzemeleri ve otomasyon sistemlerinde güvenilir çözüm ortağınız.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold text-sm uppercase tracking-wider text-blue-300 mb-3">Hızlı Bağlantılar</h3>
                    <ul class="space-y-2 text-sm text-blue-100">
                        <li><a href="/arama" class="hover:text-white transition-colors">Ürün Ara</a></li>
                        <li><a href="/iletisim" class="hover:text-white transition-colors">İletişim</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-sm uppercase tracking-wider text-blue-300 mb-3">İletişim</h3>
                    <ul class="space-y-2 text-sm text-blue-100">
                        <li>📞 <a href="tel:+905413045011" class="hover:text-white transition-colors">0541 304 50 11</a></li>
                        <li>✉️ <a href="mailto:info@astemotomasyon.com" class="hover:text-white transition-colors">info@astemotomasyon.com</a></li>
                    </ul>
                </div>

            </div>

            <div class="border-t border-blue-800 mt-8 pt-6 text-center text-xs text-blue-300">
                © {{ date('Y') }} Astem Otomasyon. Tüm hakları saklıdır.
            </div>
        </div>
    </footer>

</body>
</html>
