@extends('layouts.app')

@section('title', 'Detail Promosi')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $promotion->title }}</h1>
    <p class="text-gray-700">{{ $promotion->description }}</p>
    @if ($promotion->image)
        <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="mt-4">
    @endif
    <a href="{{ route('promotions.index') }}" class="text-blue-500 mt-4 block">Kembali</a>
@endsection
