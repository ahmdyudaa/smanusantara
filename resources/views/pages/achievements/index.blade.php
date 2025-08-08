@extends('layouts.app')

@section('title', 'Arsip Prestasi - SMA Nusantara Cendekia')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Arsip Prestasi</h1>
            <p class="text-lg text-gray-600 mt-2">Seluruh pencapaian membanggakan dari siswa dan sekolah kami.</p>
        </div>

        @if($achievements->isNotEmpty())
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($achievements as $achievement)
                <article class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <a href="{{ route('achievements.show', $achievement) }}">
                        <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $achievement->image_url ? Illuminate\Support\Facades\Storage::url($achievement->image_url) : 'https://readdy.ai/api/search-image?query=trophy,achievement' }}')"></div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="px-3 py-1 bg-blue-500 bg-opacity-10 text-blue-600 text-xs font-medium rounded-full capitalize">{{ $achievement->category->value }}</span>
                            <span class="text-gray-500 text-sm">{{ $achievement->date->format('d F Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-primary transition-colors">
                            <a href="{{ route('achievements.show', $achievement) }}">{{ $achievement->title }}</a>
                        </h3>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $achievements->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">Tidak ada prestasi yang ditemukan.</p>
            </div>
        @endif
    </div>
</div>
@endsection
