@extends('layouts.app')

@section('title', 'Daftar Promosi')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-blue-600 mb-6">Daftar Promosi</h1>
        {{-- <p>Debug: File ini digunakan</p> <!-- Debug untuk memastikan file ini digunakan --> --}}
        <p>Jumlah Promosi: {{ $promotions->count() }}</p> <!-- Debug jumlah promosi -->
        <a href="{{ route('promotions.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Tambah Promosi</a>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            @foreach ($promotions as $promotion)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if ($promotion->image)
                        <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}"
                            class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $promotion->title }}</h2>
                        <p class="text-gray-600 mt-2">{{ Str::limit($promotion->description, 100) }}</p>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('promotions.show', $promotion->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">Detail</a>
                            <a href="{{ route('promotions.edit', $promotion->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                            <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
