@extends('layouts.app')

@section('title', $pageTitle)
@section('meta_description', $metaDescription)

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section class="relative overflow-hidden text-white h-[60vh] max-h-[60vh] flex items-center">
    <img
        src="{{ asset('images/banner') }}"
        alt="Astem Otomasyon Banner"
        class="absolute inset-0 h-full w-full object-cover object-[65%_center] md:object-center scale-110 blur-[6px] md:blur-[8px] brightness-[0.47] saturate-[0.82]"
        loading="eager">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950/70 via-slate-900/54 to-blue-900/48"></div>
    <div class="absolute inset-y-0 left-0 w-[46%] md:w-[38%] bg-gradient-to-r from-slate-950/86 via-slate-900/54 to-transparent"></div>
    <div class="absolute inset-y-0 right-0 w-[46%] md:w-[38%] bg-gradient-to-l from-slate-950/86 via-slate-900/54 to-transparent"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-4 text-center py-20 md:py-28">

        {{-- Logo / Marka --}}
        <div class="mb-6">
            <span class="text-4xl md:text-5xl font-extrabold tracking-tight drop-shadow-[0_2px_10px_rgba(0,0,0,0.45)]">
                ASTEM <span class="text-[#3b82f6]">OTOMASYON</span>
            </span>
        </div>

        {{-- Tagline --}}
        <p class="text-xl md:text-2xl text-blue-100 mb-3 font-light drop-shadow-[0_2px_8px_rgba(0,0,0,0.4)]">
            Endüstriyel Elektrik Otomasyon
        </p>

        {{-- 25+ Yıl Vurgusu --}}
        <p class="text-base text-blue-200 mb-10 drop-shadow-[0_2px_8px_rgba(0,0,0,0.35)]">
            <span class="font-semibold text-white">25+ Yıllık Deneyim</span> ile güvenilir çözüm ortağınız
        </p>

        {{-- CTA Butonları --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#kategoriler"
               class="bg-[#3b82f6] hover:bg-[#2563eb] text-white font-semibold px-8 py-3 rounded-lg text-lg transition-colors duration-200">
                Ürünlerimizi Keşfet
            </a>
            <a href="tel:+905413045011"
               class="border-2 border-white hover:bg-white hover:text-[#1e3a5f] text-white font-semibold px-8 py-3 rounded-lg text-lg transition-colors duration-200">
                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg> Bizi Arayın
            </a>
        </div>
    </div>
</section>

{{-- ===== HAKKIMIZDA ===== --}}
<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8 text-center max-w-4xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold text-[#1e3a5f] mb-4">Hakkımızda</h2>
            <p class="text-gray-700 leading-relaxed text-base md:text-lg">
                Astem Otomasyon olarak elektrik ve otomasyon sektöründe 25 yılı aşkın tecrübemiz ile müşterilerimize kaliteli ürünler ve güvenilir çözümler sunmaktayız. Geniş ürün yelpazemiz ve deneyimli ekibimiz ile ihtiyaçlarınıza uygun ürünleri sizlere ulaştırıyoruz.
            </p>
        </div>
    </div>
</section>

{{-- ===== ÜRÜNLERİMİZ ===== --}}
@if($featuredCategories->isNotEmpty())
<section id="kategoriler" class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-[#1e3a5f] text-center mb-10">
            Ürünlerimiz
        </h2>

        <div class="space-y-6 md:space-y-8">
            @foreach($featuredCategories as $category)
            <section class="bg-white border border-gray-200 rounded-xl p-5 md:p-6 shadow-sm">

                @if($category->products->isEmpty())
                    <h3 class="text-lg font-semibold text-[#1e3a5f] mb-2">{{ $category->name }}</h3>
                    <p class="text-sm text-gray-500">Bu kategoride gösterilecek ürün bulunmuyor.</p>
                @else
                    <div x-data="{
                        slide(dir) {
                            const slider = this.$refs.slider;
                            const card = slider.querySelector('[data-product-card]');
                            const w = card ? card.getBoundingClientRect().width : 160;
                            slider.scrollBy({ left: dir * (w + 12), behavior: 'smooth' });
                        }
                    }">
                        {{-- Başlık + ok butonları aynı satırda --}}
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg md:text-xl font-semibold text-[#1e3a5f]">
                                {{ $category->name }}
                            </h3>
                            <div class="hidden md:flex items-center gap-2">
                                <button type="button" @click="slide(-1)"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-gray-300 bg-white text-gray-600 shadow-sm hover:border-[#1e3a5f] hover:text-[#1e3a5f] transition-colors cursor-pointer focus:outline-none"
                                        aria-label="Sola kaydır">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <button type="button" @click="slide(1)"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-gray-300 bg-white text-gray-600 shadow-sm hover:border-[#1e3a5f] hover:text-[#1e3a5f] transition-colors cursor-pointer focus:outline-none"
                                        aria-label="Sağa kaydır">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Slider --}}
                        <div x-ref="slider"
                             class="flex gap-3 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-2"
                             style="scrollbar-width:none; -ms-overflow-style:none;">
                            @foreach($category->products->take(10) as $product)
                            <article data-product-card
                                     class="group snap-start flex-shrink-0 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm hover:border-[#3b82f6] hover:shadow-md transition-all duration-200"
                                     style="width:220px; min-width:220px; max-width:220px;">
                                <div class="aspect-square overflow-hidden bg-gray-50">
                                    <img src="{{ $product->image_path ? '/storage/' . $product->image_path : asset('images/default-product.png') }}"
                                         alt="{{ $product->name }}"
                                         class="h-full w-full max-w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                         loading="lazy">
                                </div>
                                <div class="px-3 py-3">
                                    <h4 class="font-semibold text-gray-800 text-sm leading-snug mb-1 transition-transform duration-300 group-hover:scale-[1.03]">{{ $product->name }}</h4>
                                    <p class="text-xs text-gray-400 font-mono transition-transform duration-300 group-hover:scale-[1.02]">{{ $product->code }}</p>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                @endif

            </section>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===== NEDEN ASTEM ===== --}}
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-[#1e3a5f] text-center mb-10">
            Neden Astem Otomasyon?
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center group">
                <div class="text-4xl font-extrabold text-[#2563eb] mb-2 transition-transform duration-300 group-hover:scale-110">25+</div>
                <div class="text-gray-600 transition-transform duration-300 group-hover:scale-105">Yıllık Sektör Deneyimi</div>
            </div>
            <div class="text-center group">
                <div class="text-4xl font-extrabold text-[#3b82f6] mb-2 transition-transform duration-300 group-hover:scale-110">1000+</div>
                <div class="text-gray-600 transition-transform duration-300 group-hover:scale-105">Ürün Çeşidi</div>
            </div>
            <div class="text-center group">
                <div class="text-4xl font-extrabold text-[#60a5fa] mb-2 transition-transform duration-300 group-hover:scale-110">7/24</div>
                <div class="text-gray-600 transition-transform duration-300 group-hover:scale-105">Hızlı Teslimat</div>
            </div>
        </div>
    </div>
</section>

{{-- ===== İLETİŞİM CTA ===== --}}
<section class="bg-[#1e3a5f] text-white py-12">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold mb-3">Aklınızda Soru mu Var?</h2>
        <p class="text-blue-200 mb-6">Uzman ekibimiz size yardımcı olmak için hazır.</p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="tel:+905413045011"
               class="bg-[#3b82f6] hover:bg-[#2563eb] text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg> Hemen Ara
            </a>
            <a href="/iletisim"
               class="border-2 border-white hover:bg-white hover:text-[#1e3a5f] text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200">
                İletişim Bilgileri
            </a>
        </div>
    </div>
</section>

@endsection
