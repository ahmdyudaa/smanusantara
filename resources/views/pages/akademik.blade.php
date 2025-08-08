@extends('layouts.app')

@section('title', 'Akademik - SMA Nusantara Cendekia')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Informasi Akademik</h1>
            <p class="text-lg text-gray-600 mt-2">Kurikulum, program studi, dan kalender akademik.</p>
        </div>

        <div class="prose max-w-none text-lg text-gray-700 leading-relaxed bg-gray-50 p-8 rounded-2xl">
            <h2>Kurikulum</h2>
            <p>SMA Nusantara Cendekia menerapkan dua kurikulum unggulan untuk mempersiapkan siswa menghadapi tantangan global:</p>
            <ul>
                <li><strong>Kurikulum Merdeka:</strong> Kurikulum nasional yang berfokus pada pengembangan proyek dan karakter Pancasila.</li>
                <li><strong>Cambridge International Curriculum:</strong> Program internasional yang diakui secara global untuk mempersiapkan siswa studi lanjut di luar negeri.</li>
            </ul>

            <h2>Program Studi</h2>
            <p>Kami menyediakan dua program studi utama yang dapat dipilih siswa sesuai minat dan bakat:</p>
            <ol>
                <li><strong>Matematika dan Ilmu Pengetahuan Alam (MIPA):</strong> Berfokus pada pengembangan kemampuan analitis dan sains.</li>
                <li><strong>Ilmu Pengetahuan Sosial (IPS):</strong> Berfokus pada pemahaman isu-isu sosial, ekonomi, dan humaniora.</li>
            </ol>

            <h2>Kalender Akademik</h2>
            <p>Kalender akademik untuk tahun ajaran 2024/2025 akan segera tersedia untuk diunduh di halaman ini. Harap periksa kembali dalam waktu dekat.</p>

            <p>Untuk informasi lebih lanjut, silakan hubungi bagian administrasi akademik kami.</p>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .prose h1, .prose h2, .prose h3, .prose h4 {
        color: #1f2937;
        font-weight: 700;
    }
</style>
@endpush
