
    <div class="container mx-auto px-5 md:px-10 pt-28">
        <div class="banner-and-brand">
            <div></div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 bg-neutral-500 mx-auto w-fit">
                @foreach ($categories as $ct)
                    <a href="/category/{{ $ct->slug }}" class=" {{ Request::is('category/' . $ct->slug) ? 'border-b-4 border-blue-400' : '' }}">
                        <div class="px-20 py-3 hover:bg-neutral-400 w-full">
                            <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl text-center {{ Request::is('category/' . $ct->slug) ? 'text-blue-400' : 'text-neutral-300' }} ">{!! $ct->icon_awesome !!}</h1>
                            <h1 class="text-sm md:text-base {{ Request::is('category/' . $ct->slug) ? 'text-blue-400' : 'text-neutral-300' }} text-center">{{ $ct->name }}</h1>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
