<div class="bg-neutral-800 w-full py-4 shadow-lg fixed">
    <div class="container mx-auto px-5 sm:px-7 md:px-10 lg:px-12">
        <div class="flex justify-between items-center md:items-center" id="main-navbar">
            <div class="brand">
                <a href="/"
                    class="text-gray-200 font-bold text-lg sm:text-xl lg:text-2xl hover:text-gray-50 duration-200 ease-in-out">GitTopup</a>
            </div>
            <div class="button-bar md:hidden">
                <button id="open-bar"
                    class="text-base md:text-lg text-gray-200 hover:text-gray-50 duration-200 ease-in-out"><i
                        class="fa-solid fa-bars-staggered"></i></button>
            </div>
            @auth
            @if (Auth::user()->role =="Admin")
            <ul class="hidden md:flex md:gap-x-5 text-right space-y-5 md:space-y-0 items-center" id="list">
                <div class="button-bar md:hidden">
                    <button id="close-bar"
                        class="text-base md:text-lg text-gray-200 hover:text-gray-50 duration-200 ease-in-out"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <li>
                    <a href="/" class="text-gray-200 hover:text-gray-50 duration-200 ease-in-out text-base md:text-lg ">
                        <i class="fa-solid fa-house-chimney"></i> <span class="font-semibold">Home</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/product" class="text-gray-200 hover:text-gray-50 duration-200 text-base md:text-lg">
                        <i class="fa-brands fa-servicestack"></i> <span class="font-semibold">Kelola Layanan</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/brand"  class="text-gray-200 hover:text-gray-50 duration-200 text-base md:text-lg">
                        <i class="fa-solid fa-code-branch"></i> <span class="font-semibold">Kelola Brand</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/category"  class="text-gray-200 hover:text-gray-50 duration-200 text-base md:text-lg">
                        <i class="fa-solid fa-list-check"></i> <span class="font-semibold">Kelola Kategori</span>
                    </a>
                </li>
            </ul>
            @else
            <ul class="hidden md:flex md:gap-x-5 text-right space-y-5 md:space-y-0 items-center" id="list">
                <div class="button-bar md:hidden">
                    <button id="close-bar"
                        class="text-base md:text-lg text-gray-200 hover:text-gray-50 duration-200 ease-in-out"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <li>
                    <a href="/" class="text-gray-200 hover:text-gray-50 duration-200 ease-in-out text-base md:text-lg ">
                        <i class="fa-solid fa-house-chimney"></i> <span class="font-semibold">Home</span>
                    </a>
                </li>
                <li>
                    <a href="/check" class="text-gray-200 hover:text-gray-50 duration-200 text-base md:text-lg">
                        <i class="fa-solid fa-magnifying-glass"></i> <span class="font-semibold">Check Invoice</span>
                    </a>
                </li>
                <li>
                    <a href="/#contact"  class="text-gray-200 hover:text-gray-50 duration-200 text-base md:text-lg">
                        <i class="fa-solid fa-square-phone"></i> <span class="font-semibold">Contact</span>
                    </a>
                </li>
            </ul>
            @endif
            @endauth
            @guest
            <ul class="hidden md:flex md:gap-x-5 text-right space-y-5 md:space-y-0 items-center" id="list">
                <div class="button-bar md:hidden">
                    <button id="close-bar"
                        class="text-base md:text-lg text-gray-200 hover:text-gray-50 duration-200 ease-in-out"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <li>
                    <a href="/" class="text-gray-200 hover:text-gray-50 duration-200 ease-in-out text-base md:text-lg ">
                        <i class="fa-solid fa-house-chimney"></i> <span class="font-semibold">Home</span>
                    </a>
                </li>
                <li>
                    <a href="/check" class="text-gray-200 hover:text-gray-50 duration-200 text-base md:text-lg">
                        <i class="fa-solid fa-magnifying-glass"></i> <span class="font-semibold">Check Invoice</span>
                    </a>
                </li>
                <li>
                    <a href="/#contact"  class="text-gray-200 hover:text-gray-50 duration-200 text-base md:text-lg">
                        <i class="fa-solid fa-square-phone"></i> <span class="font-semibold">Contact</span>
                    </a>
                </li>
            </ul>
            @endguest
        </div>
    </div>
</div>
