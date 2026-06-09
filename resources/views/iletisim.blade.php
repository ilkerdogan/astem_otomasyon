@extends('layouts.app')

@section('title', $pageTitle)
@section('meta_description', $metaDescription)

@section('content')

{{-- Contact Content --}}
<section class="py-12 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- İletişim Bilgileri --}}
            <div class="space-y-4">

                {{-- Adres --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-[#1e3a5f] rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Adres</h3>
                            <address class="not-italic text-gray-600 text-sm leading-relaxed">
                                Esenşehir Mah. Kürkçüler Cad. Çakıroğlu Apartmanı No:28<br>
                                Ümraniye / İstanbul
                            </address>
                        </div>
                    </div>
                </div>

                {{-- Telefon --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-[#3b82f6] rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Telefon</h3>
                            <a href="tel:+905413045011"
                               class="text-[#1e3a5f] hover:text-[#3b82f6] font-medium text-sm transition-colors">
                                0541 304 50 11
                            </a>
                        </div>
                    </div>
                </div>

                {{-- E-posta --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-[#1e3a5f] rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">E-posta</h3>
                            <a href="mailto:info@astemotomasyon.com"
                               class="text-[#1e3a5f] hover:text-[#3b82f6] font-medium text-sm transition-colors">
                                info@astemotomasyon.com
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Çalışma Saatleri --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-[#1e3a5f] rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-2">Çalışma Saatleri</h3>
                            <table class="text-sm text-gray-600 w-full">
                                <tr>
                                    <td class="pr-6 py-0.5 font-medium">Pazartesi – Cuma</td>
                                    <td>08:30 – 18:00</td>
                                </tr>
                                <tr>
                                    <td class="pr-6 py-0.5 font-medium">Cumartesi</td>
                                    <td>09:00 – 13:00</td>
                                </tr>
                                <tr>
                                    <td class="pr-6 py-0.5 font-medium">Pazar</td>
                                    <td class="text-gray-400">Kapalı</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Google Maps --}}
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.6051604878803!2d29.165132275514054!3d41.01201451919564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cacf1eac1bfc7f%3A0x6770f3516163e8c2!2zRXNlbsWfZWhpciwgS8O8cmvDp8O8bGVyIENkLiBObzoyOCwgMzQ3NzYgw5xtcmFuaXllL8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1780959261373!5m2!1str!2str"
                    width="100%"
                    height="100%"
                    style="min-height: 450px; border: 0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Astem Otomasyon Konum">
                </iframe>
            </div>

        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="bg-[#1e3a5f] text-white py-10">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <p class="text-blue-200 mb-4">Hemen ulaşın, size yardımcı olalım.</p>
        <a href="tel:+905413045011"
           class="inline-block bg-[#3b82f6] hover:bg-[#2563eb] text-white font-semibold px-8 py-3 rounded-lg transition-colors">
            <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg> Şimdi Ara
        </a>
    </div>
</section>

@endsection
