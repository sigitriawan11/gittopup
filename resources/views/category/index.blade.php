@extends('partials.main')

@section('content')
<div class="flex gap-x-3 mb-5 items-center">
    <div class="md:h-2 md:w-7 h-1.5 sm:w-6 w-5 lg:w-8 bg-blue-600 rounded-full"></div>
    <h3 class="block text-lg md:text-xl lg:text-2xl text-blue-600">{{ $ct }}</h3>
</div>
<div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-10 sm:gap-x12 md:gap-x-14 lg:gap-x-16">
    @foreach ($brands as $brand)
        <a href="/order/{{ $brand->slug }}" class="mt-5 self-start mr-auto mx-auto bg-neutral-200 rounded-b-md ring-1 pb-2 ring-blue-600">
            <img src="{{ asset('storage/' . $brand->image) }}" class="md:w-32 sm:w-28 w-24 lg:w-36" alt="">
            <h1 class="mt-1 font-semibold text-xs md:text-sm text-neutral-600 text-center">{!! $brand->name !!}</h1>

            <button class="bg-blue-600 text-neutral-50 text-xs md:text-sm mt-5 hover:bg-blue-500 duration-200 ease-out block px-6 py-1.5 rounded-full mx-auto">Top Up</button>
        </a>
    @endforeach
</div>

@endsection
