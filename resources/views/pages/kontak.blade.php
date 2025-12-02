@extends('layouts.app')

@section('title', 'Kontak Kami - SMA Nusantara Cendekia')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Hubungi Kami</h1>
            <p class="text-lg text-gray-600 mt-2">Kami siap membantu Anda. Silakan hubungi kami melalui informasi di bawah ini.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="bg-white p-8 rounded-2xl shadow-sm">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kontak</h2>
                <div class="space-y-6 text-gray-700">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-primary text-white rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="ri-map-pin-line text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold">Alamat</h3>
                            <p>Jl. Pendidikan Raya No. 123<br>Jakarta Selatan 12180, Indonesia</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-primary text-white rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="ri-phone-line text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold">Telepon</h3>
                            <p>(021) 7654-3210</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-primary text-white rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="ri-mail-line text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold">Email</h3>
                            <p>info@smanusantara.sch.id</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Google Maps Placeholder -->
            <div class="bg-white p-8 rounded-2xl shadow-sm">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Lokasi Kami</h2>
                <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                    <p class="text-gray-500">[Google Maps Embed Placeholder]</p>
                </div>
            </div>
        </div>

        <!-- Contact Form Placeholder -->
        <div class="mt-12 bg-white p-8 rounded-2xl shadow-sm">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Kirim Pesan</h2>
            <form action="#" method="POST" class="max-w-xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <input type="text" placeholder="Nama Lengkap" class="w-full px-4 py-3 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <input type="email" placeholder="Alamat Email" class="w-full px-4 py-3 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <input type="text" placeholder="Subjek" class="w-full px-4 py-3 bg-gray-100 rounded-lg mb-6 focus:outline-none focus:ring-2 focus:ring-primary">
                <textarea placeholder="Pesan Anda" rows="5" class="w-full px-4 py-3 bg-gray-100 rounded-lg mb-6 focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                <div class="text-center">
                    <button type="submit" class="bg-primary text-white font-medium px-8 py-3 rounded-button hover:bg-blue-700 transition-colors">Kirim Pesan</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
