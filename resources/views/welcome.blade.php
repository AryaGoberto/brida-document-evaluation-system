<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Evaluasi Inovasi Daerah — BRIDA Kota Makassar</title>
    <meta name="description" content="Portal evaluasi terpadu kematangan inovasi daerah berbantuan AI BRIDA Kota Makassar. Penilaian 21 indikator resmi sesuai regulasi IGA Kemendagri.">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
        .hero-pattern {
            background-color: #0b1120;
            background-image: 
                radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.22) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(99, 102, 241, 0.25) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(14, 165, 233, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(79, 70, 229, 0.2) 0px, transparent 50%);
        }
        .glow-effect {
            box-shadow: 0 0 50px -10px rgba(59, 130, 246, 0.35);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-blue-600 selection:text-white" x-data="{ mobileMenuOpen: false }">

    <!-- NAVIGATION HEADER -->
    <header class="fixed top-0 inset-x-0 z-50 bg-slate-900/80 backdrop-blur-lg border-b border-slate-800/80 transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand Identity -->
                <a href="{{ url('/') }}" class="flex items-center group">
                    <div class="bg-white px-3 py-1.5 rounded-xl shadow-sm flex items-center group-hover:scale-105 transition-transform duration-200">
                        <img src="{{ asset('images/brida.png') }}" alt="Logo BRIDA Kota Makassar" class="h-8 sm:h-9 w-auto object-contain">
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-300">
                    <a href="#tentang" class="hover:text-white transition-colors">Tentang Sistem</a>
                    <a href="#alur" class="hover:text-white transition-colors">Alur 5 Tahap</a>
                    <a href="#indikator" class="hover:text-white transition-colors">21 Indikator</a>
                    <a href="#ai-engine" class="hover:text-white transition-colors flex items-center gap-1.5">
                        <span>Model AI</span>
                        <span class="px-1.5 py-0.2 rounded text-[10px] bg-indigo-500/30 text-indigo-300 border border-indigo-500/40">OCR</span>
                    </a>
                    <a href="#peran" class="hover:text-white transition-colors">Akses Peran</a>
                </nav>

                <!-- Auth Action Buttons -->
                <div class="hidden sm:flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white text-sm font-bold shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 transition-all duration-200 hover:-translate-y-0.5">
                            <span>Buka Dasbor</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2.5 text-sm font-bold text-slate-300 hover:text-white transition-colors">
                            Masuk
                        </a>
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white text-sm font-bold shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 transition-all duration-200 hover:-translate-y-0.5">
                            <span>Mulai Akses</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden bg-slate-900 border-b border-slate-800 px-4 pt-3 pb-6 space-y-3">
            <a href="#tentang" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">Tentang Sistem</a>
            <a href="#alur" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">Alur 5 Tahap</a>
            <a href="#indikator" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">21 Indikator Kematangan</a>
            <a href="#ai-engine" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">Model AI</a>
            <a href="#peran" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">Akses Peran</a>
            <div class="pt-3 border-t border-slate-800 flex flex-col gap-2">
                <a href="{{ route('login') }}" class="w-full text-center py-2.5 rounded-xl bg-blue-600 text-white font-bold text-sm">
                    Masuk ke Sistem
                </a>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero-pattern pt-32 pb-24 lg:pt-40 lg:pb-32 text-white relative overflow-hidden">
        <!-- Background Lighting Circles -->
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[900px] h-[500px] bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                
                <!-- Pill Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-800/80 border border-slate-700/80 text-blue-400 text-xs sm:text-sm font-semibold mb-8 shadow-sm">
                    <span class="flex h-2 w-2 rounded-full bg-blue-400 animate-pulse"></span>
                    <span>Transformasi Digital BRIDA Kota Makassar • Standar IGA Kemendagri</span>
                </div>

                <!-- Headline Utama -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight lg:leading-[1.15]">
                    Sistem Evaluasi Otomatis Dokumen PDF Berdasarkan Parameter dan Indikator Standar pada BRIDA Kota Makassar
                </h1>

                <!-- Subtitle / Deskripsi Singkat Projek -->
                <p class="mt-6 text-base sm:text-lg lg:text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed font-normal">
                    Platform cerdas untuk pendataan, validasi berkas fisik berbantuan model AI, dan penetapan skor 21 indikator kematangan inovasi dari seluruh <strong>143 SKPD, Puskesmas, dan Kecamatan</strong> di Pemerintah Kota Makassar.
                </p>

                <!-- Tombol CTA Masuk Sesuai Role -->
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-7 py-4 rounded-2xl bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-base shadow-xl shadow-blue-600/35 hover:shadow-blue-600/50 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>Mulai Pengajuan (Inovator OPD)</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-4 rounded-2xl bg-slate-800/90 hover:bg-slate-800 text-slate-200 hover:text-white font-bold text-base border border-slate-700 hover:border-slate-600 shadow-md transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <span>Ruang Kerja Evaluator BRIDA</span>
                    </a>
                </div>

                <!-- 4 Statistik Capaian / Cakupan Sistem -->
                <div class="mt-16 grid grid-cols-2 lg:grid-cols-4 gap-4 text-left">
                    <div class="p-5 rounded-2xl bg-slate-800/50 backdrop-blur border border-slate-800">
                        <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">143</div>
                        <div class="text-xs uppercase font-bold tracking-wider text-slate-400 mt-1">Perangkat Daerah &amp; Unit</div>
                        <p class="text-[11px] text-slate-500 mt-0.5">Dinas, Puskesmas, Kecamatan se-Makassar</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-800/50 backdrop-blur border border-slate-800">
                        <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-300">21</div>
                        <div class="text-xs uppercase font-bold tracking-wider text-slate-400 mt-1">Indikator Kematangan</div>
                        <p class="text-[11px] text-slate-500 mt-0.5">Bobot penilaian resmi regulasi Kemendagri</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-800/50 backdrop-blur border border-slate-800">
                        <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-300">AI OCR</div>
                        <div class="text-xs uppercase font-bold tracking-wider text-slate-400 mt-1">Analisis Berkas Cerdas</div>
                        <p class="text-[11px] text-slate-500 mt-0.5">Deteksi TTE, SK, dan validasi dokumen fisik</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-800/50 backdrop-blur border border-slate-800">
                        <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-300">111</div>
                        <div class="text-xs uppercase font-bold tracking-wider text-slate-400 mt-1">Skor Maksimal Sidang</div>
                        <p class="text-[11px] text-slate-500 mt-0.5">Predikat Sangat Inovatif &amp; Lolos IGA</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: TENTANG PROJEK & LATAR BELAKANG -->
    <section id="tentang" class="py-20 lg:py-28 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                <!-- Sisi Kiri: Narasi Problem & Transformasi -->
                <div class="space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs font-bold uppercase tracking-wider">
                        Tentang Projek
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight leading-tight">
                        Mengapa Sistem Ini Diciptakan untuk Kota Makassar?
                    </h2>
                    <p class="text-slate-600 text-base leading-relaxed">
                        Setiap tahun, ratusan inovasi diciptakan oleh Dinas, Rumah Sakit Daerah, Puskesmas, dan Kelurahan di Kota Makassar. Namun, proses evaluasi manual sering mengalami kendala:
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200/80">
                            <div class="w-9 h-9 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center font-bold flex-shrink-0">
                                ✕
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Beban Berkas Fisik &amp; Dokumen Tercecer</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Pengumpulan manual 21 dokumen SK, Perda, SOP, dan foto menyebabkan tim penilai kewalahan dan arsip sulit dilacak.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200/80">
                            <div class="w-9 h-9 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center font-bold flex-shrink-0">
                                ✕
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Waktu Penilaian Sangat Panjang</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Memeriksa keaslian tanda tangan basah dan kesesuaian klausul hukum satu per satu membutuhkan waktu berminggu-minggu.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-xl bg-blue-50/80 border border-blue-200">
                            <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold flex-shrink-0">
                                ✓
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-950 text-sm">Solusi SID-BRIDA Berbasis AI</h4>
                                <p class="text-xs text-blue-800/80 mt-0.5">Digitalisasi penuh: Inovator submit via Wizard 5 Tahap, model AI mengekstrak dan merekomendasikan skor bintang 1–3, lalu verifikator BRIDA memvalidasi lewat antarmuka layar terbelah.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sisi Kanan: Visual Card Showcase Ruang Kerja Split-Screen -->
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl opacity-10 blur-xl"></div>
                    <div class="relative rounded-2xl bg-slate-900 text-white p-6 sm:p-8 shadow-2xl border border-slate-800 space-y-6">
                        <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-rose-500"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-500"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                                <span class="text-xs font-mono text-slate-400 ml-2">split_screen_workspace.blade.php</span>
                            </div>
                            <span class="text-xs font-bold text-indigo-400 bg-indigo-500/10 px-2.5 py-1 rounded-full border border-indigo-500/20">Live Workspace</span>
                        </div>

                        <!-- Mini Mockup Interface -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                            <!-- Sisi Kiri Mockup: PDF Viewer -->
                            <div class="p-4 rounded-xl bg-slate-800/90 border border-slate-700/80 space-y-3">
                                <div class="flex items-center justify-between text-[11px] text-slate-400">
                                    <span class="font-semibold text-white">📄 PDF Viewer (Kiri)</span>
                                    <span class="bg-blue-900/60 text-blue-300 px-1.5 py-0.5 rounded text-[10px]">No Download</span>
                                </div>
                                <div class="bg-slate-950 p-3 rounded-lg border border-slate-800 font-mono text-[10px] text-slate-400 space-y-1">
                                    <p class="text-blue-400 font-bold">PERATURAN WALIKOTA MAKASSAR</p>
                                    <p>Nomor 14 Tahun 2025...</p>
                                    <p class="text-emerald-400">✓ Barcode TTE BSrE Valid</p>
                                </div>
                                <p class="text-[11px] text-slate-400">Penampil dokumen interaktif dengan zoom, pencarian teks, dan lompat halaman.</p>
                            </div>

                            <!-- Sisi Kanan Mockup: 20 Indikator Accordion -->
                            <div class="p-4 rounded-xl bg-slate-800/90 border border-slate-700/80 space-y-3">
                                <div class="flex items-center justify-between text-[11px] text-slate-400">
                                    <span class="font-semibold text-white">⚖️ 21 Indikator (Kanan)</span>
                                    <span class="bg-emerald-900/60 text-emerald-300 px-1.5 py-0.5 rounded text-[10px]">AI Star Rating</span>
                                </div>
                                <div class="bg-slate-950 p-3 rounded-lg border border-slate-800 space-y-1.5">
                                    <div class="flex justify-between items-center text-[10px]">
                                        <span class="font-bold text-white">1. Regulasi Daerah</span>
                                        <span class="text-amber-400 font-bold">★ ★ ★ (3.0)</span>
                                    </div>
                                    <p class="text-[10px] text-slate-400">AI: Teridentifikasi SK Walikota sah. Poin: 5.5 / 5.5</p>
                                </div>
                                <p class="text-[11px] text-slate-400">Evaluator manusia cukup mengonfirmasi skor AI atau melakukan penyesuaian.</p>
                            </div>
                        </div>

                        <!-- Footer Mockup Card -->
                        <div class="pt-4 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                            <span>Keluaran: <strong>Berita Acara Resmi Sidang Pleno</strong></span>
                            <span class="text-emerald-400 font-bold">Skor Final: 105 / 111</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: 4 FITUR UTAMA SISTEM -->
    <section class="py-20 lg:py-28 bg-slate-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider bg-blue-50 px-3 py-1 rounded-full border border-blue-200">Pilar Utama Sistem</span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3 tracking-tight">
                    Fitur Unggulan Mempermudah Inovator &amp; Evaluator
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-3">
                    Dirancang dengan estetika modern, alur kerja tanpa hambatan, dan keamanan data tingkat tinggi bagi ASN Kota Makassar.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Fitur 1 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xl mb-5 shadow-md shadow-blue-500/20">
                        1
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Wizard Pengajuan 5 Tahap</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Formulir terstruktur dari Kategori &amp; PIC, Metadata, Rich Text Rancang Bangun, 17 SDGs, hingga unggah berkas bukti dukung secara terpandu.
                    </p>
                </div>

                <!-- Fitur 2 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold text-xl mb-5 shadow-md shadow-indigo-500/20">
                        2
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Analisis Dokumen Berbantu AI</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Model AI membaca ratusan lembar PDF secara otomatis di latar belakang, mengekstrak klausul SK, dan merekomendasikan estimasi skor bintang 1–3.
                    </p>
                </div>

                <!-- Fitur 3 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-cyan-600 text-white flex items-center justify-center font-bold text-xl mb-5 shadow-md shadow-cyan-500/20">
                        3
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Ruang Kerja Split-Screen</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Evaluator memverifikasi berkas fisik PDF di panel kiri sambil mencocokkan klaim AI di panel kanan tanpa perlu mengunduh dokumen ke komputer.
                    </p>
                </div>

                <!-- Fitur 4 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-xl mb-5 shadow-md shadow-emerald-500/20">
                        4
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Berita Acara &amp; Rekap PDF</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Penerbitan otomatis Berita Acara sidang verifikasi dengan nomor registrasi unik dan rekapitulasi eksekutif siap cetak untuk Walikota Makassar.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: ALUR KERJA 5 TAHAP PENGIRIMAN -->
    <section id="alur" class="py-20 lg:py-28 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider bg-indigo-50 px-3 py-1 rounded-full border border-indigo-200">Alur Standar Inovator</span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3 tracking-tight">
                    Alur Wizard 5 Tahap Pengajuan Inovasi
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-3">
                    Setiap Organisasi Perangkat Daerah (OPD) melewati lima langkah praktis dengan validasi otomatis di setiap tahapan.
                </p>
            </div>

            <!-- 5 Steps Timeline Visual -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 relative">
                
                <!-- Tahap 1 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/90 relative group hover:border-blue-400 transition-colors">
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-lg bg-blue-600 text-white font-extrabold text-sm flex items-center justify-center">1</span>
                        <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wider">Tahap 1</span>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm mb-1">Kategori &amp; PIC</h4>
                    <p class="text-slate-500 text-xs">Penentuan kategori inovasi, urusan pemerintahan, dan kontak penanggung jawab OPD.</p>
                </div>

                <!-- Tahap 2 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/90 relative group hover:border-blue-400 transition-colors">
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-lg bg-indigo-600 text-white font-extrabold text-sm flex items-center justify-center">2</span>
                        <span class="text-[10px] font-bold text-indigo-600 uppercase tracking-wider">Tahap 2</span>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm mb-1">Metadata &amp; Jadwal</h4>
                    <p class="text-slate-500 text-xs">Judul resmi inovasi, tanggal uji coba perdana, dan tanggal mulai implementasi.</p>
                </div>

                <!-- Tahap 3 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/90 relative group hover:border-blue-400 transition-colors">
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-lg bg-cyan-600 text-white font-extrabold text-sm flex items-center justify-center">3</span>
                        <span class="text-[10px] font-bold text-cyan-600 uppercase tracking-wider">Tahap 3</span>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm mb-1">Rancang Bangun</h4>
                    <p class="text-slate-500 text-xs">Uraian latar belakang permasalahan, ide kreatif pemecahan, tujuan, dan manfaat nyata.</p>
                </div>

                <!-- Tahap 4 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/90 relative group hover:border-blue-400 transition-colors">
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-lg bg-purple-600 text-white font-extrabold text-sm flex items-center justify-center">4</span>
                        <span class="text-[10px] font-bold text-purple-600 uppercase tracking-wider">Tahap 4</span>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm mb-1">17 Target SDGs</h4>
                    <p class="text-slate-500 text-xs">Pemetaan kontribusi inovasi daerah terhadap Tujuan Pembangunan Berkelanjutan (SDGs).</p>
                </div>

                <!-- Tahap 5 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/90 relative group hover:border-blue-400 transition-colors">
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-lg bg-emerald-600 text-white font-extrabold text-sm flex items-center justify-center">5</span>
                        <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider">Tahap 5</span>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm mb-1">Upload 21 Indikator</h4>
                    <p class="text-slate-500 text-xs">Pengunggahan berkas bukti PDF per indikator dan persetujuan pakta integritas resmi.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: 21 INDIKATOR KEMATANGAN INOVASI DAERAH -->
    <section id="indikator" class="py-20 lg:py-28 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold text-blue-400 uppercase tracking-wider bg-blue-500/10 px-3 py-1 rounded-full border border-blue-500/20">Rubrik Resmi Kemendagri &amp; BRIDA</span>
                <h2 class="text-3xl sm:text-4xl font-black text-white mt-3 tracking-tight">
                    21 Indikator Kematangan Inovasi Daerah
                </h2>
                <p class="text-slate-400 text-sm sm:text-base mt-3">
                    Setiap indikator memiliki bobot resmi mulai dari 1.0 hingga 4.0 dengan total kalkulasi skor maksimal 111 poin.
                </p>
            </div>

            <!-- Grid 21 Indikator Ringkas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @php
                    $indikatorList = [
                        ['no' => 1, 'judul' => 'Regulasi Inovasi Daerah', 'bobot' => '3.0', 'ket' => 'Perda / Perwali / SK Walikota'],
                        ['no' => 2, 'judul' => 'Ketersediaan SDM Inovasi', 'bobot' => '2.0', 'ket' => 'SK penetapan tim pelaksana'],
                        ['no' => 3, 'judul' => 'Dukungan Anggaran', 'bobot' => '2.0', 'ket' => 'Alokasi dalam DPA OPD'],
                        ['no' => 4, 'judul' => 'Bimtek / Pelatihan Inovasi', 'bobot' => '1.0', 'ket' => 'Sertifikat & laporan pelatihan'],
                        ['no' => 5, 'judul' => 'Integrasi RKPD Daerah', 'bobot' => '2.0', 'ket' => 'Pencantuman dalam RKPD'],
                        ['no' => 6, 'judul' => 'Keterlibatan Aktor Inovasi', 'bobot' => '1.0', 'ket' => 'Pentahelix (kampus, swasta, warga)'],
                        ['no' => 7, 'judul' => 'Pelaksana Inovasi Daerah', 'bobot' => '1.0', 'ket' => 'Kualifikasi jabatan personil'],
                        ['no' => 8, 'judul' => 'Jejaring Inovasi Daerah', 'bobot' => '1.0', 'ket' => 'MoU / Kerjasama kemitraan'],
                        ['no' => 9, 'judul' => 'Sosialisasi Inovasi Daerah', 'bobot' => '1.0', 'ket' => 'Liputan media / leaflet / workshop'],
                        ['no' => 10, 'judul' => 'Pedoman Teknis (SOP)', 'bobot' => '1.0', 'ket' => 'Buku pedoman teknis resmi'],
                        ['no' => 11, 'judul' => 'Media Informasi Layanan', 'bobot' => '1.0', 'ket' => 'Website / Medsos / Aplikasi'],
                        ['no' => 12, 'judul' => 'Kemudahan Proses Layanan', 'bobot' => '2.0', 'ket' => 'Pemangkasan alur & persyaratan'],
                        ['no' => 13, 'judul' => 'Integrasi Sistem Layanan', 'bobot' => '2.0', 'ket' => 'Integrasi API / Satu Data'],
                        ['no' => 14, 'judul' => 'Replikasi Inovasi', 'bobot' => '3.0', 'ket' => 'Diadopsi oleh daerah/dinas lain'],
                        ['no' => 15, 'judul' => 'Alat Kerja / Perlengkapan', 'bobot' => '2.0', 'ket' => 'Dukungan infrastruktur fisik/TI'],
                        ['no' => 16, 'judul' => 'Kemanfaatan Inovasi Daerah', 'bobot' => '3.0', 'ket' => 'Efisiensi waktu & anggaran nyata'],
                        ['no' => 17, 'judul' => 'Kecepatan Penciptaan', 'bobot' => '2.0', 'ket' => 'Realisasi ide hingga implementasi'],
                        ['no' => 18, 'judul' => 'Kepuasan Pengguna (SKM)', 'bobot' => '1.0', 'ket' => 'Laporan survei indeks kepuasan'],
                        ['no' => 19, 'judul' => 'Penyelesaian Pengaduan', 'bobot' => '2.0', 'ket' => 'SOP & tindak lanjut komplain'],
                        ['no' => 20, 'judul' => 'Monitoring & Evaluasi', 'bobot' => '2.0', 'ket' => 'Laporan berkala hasil monev'],
                        ['no' => 21, 'judul' => 'Kualitas Inovasi Daerah', 'bobot' => '4.0', 'ket' => 'Video dokumentasi & dampak luas'],
                    ];
                @endphp

                @foreach ($indikatorList as $ind)
                    <div class="p-4 rounded-xl bg-slate-800/70 border border-slate-700/80 hover:border-blue-500/50 hover:bg-slate-800 transition-all flex items-start gap-3">
                        <span class="w-7 h-7 rounded-lg bg-blue-600/30 text-blue-400 font-black text-xs flex items-center justify-center border border-blue-500/30 flex-shrink-0">
                            {{ $ind['no'] }}
                        </span>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2">
                                <h4 class="font-bold text-white text-xs truncate">{{ $ind['judul'] }}</h4>
                                <span class="text-[10px] font-bold text-cyan-300 bg-cyan-950/60 px-1.5 py-0.5 rounded border border-cyan-800/60 flex-shrink-0">
                                    Bobot {{ $ind['bobot'] }}
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-1 truncate">{{ $ind['ket'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION: AKSES BERDASARKAN PERAN (INNOVATOR VS EVALUATOR) -->
    <section id="peran" class="py-20 lg:py-28 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider bg-blue-50 px-3 py-1 rounded-full border border-blue-200">Akses Pengguna</span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3 tracking-tight">
                    Dua Peran Utama dalam Ekosistem BRIDA
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-3">
                    Sistem memisahkan ruang kerja secara otomatis berdasarkan hak akses pengguna saat login.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                
                <!-- Role Card 1: Inovator -->
                <div class="p-8 rounded-3xl bg-gradient-to-b from-blue-50/60 to-white border-2 border-blue-200 shadow-lg relative overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-bold uppercase tracking-wider">
                                Role: Inovator OPD
                            </span>
                            <span class="text-2xl">🏢</span>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-2">Inovator Perangkat Daerah</h3>
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed">
                            Diperuntukkan bagi perwakilan Dinas, Bagian Setda, Kecamatan, Kelurahan, dan Puskesmas yang ingin mengajukan proposal inovasi baru atau memperbaiki berkas revisi.
                        </p>

                        <ul class="space-y-3 text-xs text-slate-700 mb-8">
                            <li class="flex items-center gap-2">
                                <span class="text-blue-600 font-bold">✓</span>
                                <span>Akses Dasbor Pemantauan Progres Status Inovasi</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-blue-600 font-bold">✓</span>
                                <span>Formulir Wizard 5 Tahap Terpadu &amp; Rich Text Editor</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-blue-600 font-bold">✓</span>
                                <span>Mode Perbaikan Berkas Dokumen Sanggah / Revisi</span>
                            </li>
                        </ul>
                    </div>

                    <a href="{{ route('login') }}" class="w-full text-center py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md transition-all">
                        Masuk sebagai Inovator &rarr;
                    </a>
                </div>

                <!-- Role Card 2: Evaluator BRIDA -->
                <div class="p-8 rounded-3xl bg-gradient-to-b from-slate-900 to-indigo-950 text-white border-2 border-indigo-700 shadow-xl relative overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-indigo-500/20 text-indigo-300 border border-indigo-500/40 text-xs font-bold uppercase tracking-wider">
                                Role: Evaluator BRIDA
                            </span>
                            <span class="text-2xl">⚖️</span>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-2">Tim Penilai &amp; Verifikator</h3>
                        <p class="text-slate-300 text-sm mb-6 leading-relaxed">
                            Diperuntukkan bagi verifikator ahli BRIDA Kota Makassar untuk menelaah dokumen fisik, memvalidasi klaim AI, menyidangkan nilai, dan menerbitkan Berita Acara.
                        </p>

                        <ul class="space-y-3 text-xs text-slate-300 mb-8">
                            <li class="flex items-center gap-2">
                                <span class="text-indigo-400 font-bold">✓</span>
                                <span>Task Inbox Prioritas &amp; Antrean Lengkap 143 Dinas</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-indigo-400 font-bold">✓</span>
                                <span>Ruang Kerja Validasi Layar Terbelah (Split-Screen Workspace)</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-indigo-400 font-bold">✓</span>
                                <span>Penerbitan Berita Acara &amp; Ekspor Laporan Rekapitulasi PDF</span>
                            </li>
                        </ul>
                    </div>

                    <a href="{{ route('login') }}" class="w-full text-center py-3.5 rounded-xl bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white font-bold text-sm shadow-md transition-all">
                        Masuk sebagai Evaluator &rarr;
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: PUSAT KREDENSIAL DEMO / UJI COBA -->
    <section class="py-16 bg-slate-100 border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-2">Akses Cepat Pengujian (Demo Sandbox)</span>
            <h3 class="text-xl font-bold text-slate-900 mb-6">Gunakan Akun Simulasi Berikut untuk Menguji Sistem:</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-left">
                <!-- Demo Box 1: Inovator -->
                <div class="p-5 rounded-2xl bg-white border border-blue-200 shadow-sm">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-bold text-blue-700 text-sm">🏢 Akun Inovator (Dinkes)</span>
                        <span class="text-[10px] bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full font-bold">Inovator</span>
                    </div>
                    <div class="text-xs text-slate-600 space-y-1 font-mono">
                        <div>Email: <strong class="text-slate-900">test@example.com</strong></div>
                        <div>Password: <strong class="text-slate-900">password</strong></div>
                    </div>
                    <a href="{{ route('login') }}" class="mt-4 block text-center py-2 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold text-xs transition">
                        Buka Login Inovator &rarr;
                    </a>
                </div>

                <!-- Demo Box 2: Evaluator -->
                <div class="p-5 rounded-2xl bg-white border border-indigo-200 shadow-sm">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-bold text-indigo-700 text-sm">⚖️ Akun Evaluator (BRIDA)</span>
                        <span class="text-[10px] bg-indigo-100 text-indigo-800 px-2 py-0.5 rounded-full font-bold">Evaluator</span>
                    </div>
                    <div class="text-xs text-slate-600 space-y-1 font-mono">
                        <div>Email: <strong class="text-slate-900">evaluator@example.com</strong></div>
                        <div>Password: <strong class="text-slate-900">password</strong></div>
                    </div>
                    <a href="{{ route('login') }}" class="mt-4 block text-center py-2 rounded-lg bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold text-xs transition">
                        Buka Login Evaluator &rarr;
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 py-12 text-sm border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-3">
                    <div class="bg-white px-2 py-1 rounded-lg flex items-center">
                        <img src="{{ asset('images/brida.png') }}" alt="Logo BRIDA" class="h-6 w-auto object-contain">
                    </div>
                    <div>
                        <p class="font-bold text-white text-sm">Badan Riset dan Inovasi Daerah (BRIDA)</p>
                        <p class="text-xs text-slate-500">Pemerintah Kota Makassar — Balai Kota Makassar, Jl. Ahmad Yani No. 2</p>
                    </div>
                </div>

                <div class="flex items-center gap-6 text-xs text-slate-500">
                    <a href="#tentang" class="hover:text-slate-300 transition-colors">Tentang</a>
                    <a href="#alur" class="hover:text-slate-300 transition-colors">Alur 5 Tahap</a>
                    <a href="#indikator" class="hover:text-slate-300 transition-colors">21 Indikator</a>
                    <a href="{{ route('login') }}" class="hover:text-slate-300 transition-colors">Masuk Sistem</a>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-slate-900 text-center text-xs text-slate-600">
                &copy; {{ date('Y') }} BRIDA Kota Makassar. Seluruh hak cipta dilindungi undang-undang.
            </div>
        </div>
    </footer>

</body>
</html>
