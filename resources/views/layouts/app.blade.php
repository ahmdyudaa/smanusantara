<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMA Nusantara Cendekia')</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#059669'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        .slider-container { position: relative; overflow: hidden; }
        .slider-track { display: flex; transition: transform 0.5s ease; }
        .slider-slide { min-width: 100%; }
        .announcement-item { border-left: 4px solid #1e40af; }
        .testimonial-card { transform: translateX(0); transition: transform 0.5s ease; }
        .gallery-item { transition: transform 0.3s ease; }
        .gallery-item:hover { transform: scale(1.05); }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">SN</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">SMA Nusantara Cendekia</h1>
                        <p class="text-sm text-gray-600">Unggul dalam Prestasi, Berkarakter Mulia</p>
                    </div>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 {{ request()->routeIs('home') ? 'text-primary' : 'text-gray-700' }} hover:text-primary font-medium">
                        <div class="w-5 h-5 flex items-center justify-center"><i class="ri-home-line"></i></div>
                        <span>Beranda</span>
                    </a>
                    <div class="relative group">
                        <a href="#" class="flex items-center space-x-2 {{ request()->routeIs('pages.show*') ? 'text-primary' : 'text-gray-700' }} hover:text-primary">
                            <div class="w-5 h-5 flex items-center justify-center"><i class="ri-user-line"></i></div>
                            <span>Profil</span>
                            <div class="w-5 h-5 flex items-center justify-center"><i class="ri-arrow-down-s-line transition-transform group-hover:rotate-180"></i></div>
                        </a>
                        <div class="absolute left-0 top-full mt-2 w-56 bg-white rounded-xl shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="{{ route('pages.show', 'visi_misi') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary">
                                <div class="w-5 h-5 flex items-center justify-center"><i class="ri-eye-line"></i></div>
                                <span>Visi & Misi</span>
                            </a>
                            <a href="{{ route('pages.show', 'sejarah_sekolah') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary">
                                <div class="w-5 h-5 flex items-center justify-center"><i class="ri-history-line"></i></div>
                                <span>Sejarah Sekolah</span>
                            </a>
                            <a href="{{ route('pages.show', 'struktur_organisasi') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary">
                                <div class="w-5 h-5 flex items-center justify-center"><i class="ri-team-line"></i></div>
                                <span>Struktur Organisasi</span>
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('pages.akademik') }}" class="flex items-center space-x-2 {{ request()->routeIs('pages.akademik') ? 'text-primary' : 'text-gray-700' }} hover:text-primary">
                        <div class="w-5 h-5 flex items-center justify-center"><i class="ri-book-line"></i></div>
                        <span>Akademik</span>
                    </a>
                    <a href="{{ route('news.index') }}" class="flex items-center space-x-2 {{ request()->routeIs('news.*') ? 'text-primary' : 'text-gray-700' }} hover:text-primary">
                        <div class="w-5 h-5 flex items-center justify-center"><i class="ri-news-line"></i></div>
                        <span>Berita</span>
                    </a>
                    <a href="{{ route('pages.kontak') }}" class="flex items-center space-x-2 {{ request()->routeIs('pages.kontak') ? 'text-primary' : 'text-gray-700' }} hover:text-primary">
                        <div class="w-5 h-5 flex items-center justify-center"><i class="ri-phone-line"></i></div>
                        <span>Kontak</span>
                    </a>
                </nav>
                <button class="md:hidden w-8 h-8 flex items-center justify-center" id="mobile-menu-btn">
                    <i class="ri-menu-line text-xl"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="md:hidden hidden bg-white border-t border-gray-200" id="mobile-menu">
            <div class="px-4 py-2 space-y-2">
                <a href="{{ route('home') }}" class="block py-2 {{ request()->routeIs('home') ? 'text-primary' : 'text-gray-700' }} font-medium">Beranda</a>
                <a href="{{ route('pages.show', 'visi_misi') }}" class="block py-2 text-gray-700">Visi & Misi</a>
                <a href="{{ route('pages.show', 'sejarah_sekolah') }}" class="block py-2 text-gray-700">Sejarah Sekolah</a>
                <a href="{{ route('pages.show', 'struktur_organisasi') }}" class="block py-2 text-gray-700">Struktur Organisasi</a>
                <a href="{{ route('pages.akademik') }}" class="block py-2 {{ request()->routeIs('pages.akademik') ? 'text-primary' : 'text-gray-700' }}">Akademik</a>
                <a href="{{ route('news.index') }}" class="block py-2 {{ request()->routeIs('news.*') ? 'text-primary' : 'text-gray-700' }}">Berita</a>
                <a href="{{ route('pages.kontak') }}" class="block py-2 {{ request()->routeIs('pages.kontak') ? 'text-primary' : 'text-gray-700' }}">Kontak</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold">SN</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold">SMA Nusantara Cendekia</h3>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6">Sekolah menengah atas unggulan yang mengutamakan prestasi akademik dan pembentukan karakter siswa.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-primary transition-colors"><i class="ri-facebook-fill"></i></a>
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-primary transition-colors"><i class="ri-instagram-line"></i></a>
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-primary transition-colors"><i class="ri-youtube-line"></i></a>
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-primary transition-colors"><i class="ri-twitter-line"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6">Menu Utama</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Profil Sekolah</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Program Akademik</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Fasilitas</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Prestasi</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6">Informasi</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Penerimaan Siswa Baru</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Berita & Pengumuman</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kalender Akademik</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Download</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6">Kontak</h4>
                    <div class="space-y-3 text-gray-400">
                        <div class="flex items-start space-x-3">
                            <div class="w-5 h-5 flex items-center justify-center mt-1"><i class="ri-map-pin-line text-sm"></i></div>
                            <span class="text-sm">Jl. Pendidikan Raya No. 123<br>Jakarta Selatan 12180</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-5 h-5 flex items-center justify-center"><i class="ri-phone-line text-sm"></i></div>
                            <span class="text-sm">(021) 7654-3210</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-5 h-5 flex items-center justify-center"><i class="ri-mail-line text-sm"></i></div>
                            <span class="text-sm">info@smanusantara.sch.id</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 SMA Nusantara Cendekia. Seluruh hak cipta dilindungi undang-undang.</p>
            </div>
        </div>
    </footer>

    <script id="mobile-menu-toggle">
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
