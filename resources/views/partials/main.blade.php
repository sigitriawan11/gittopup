<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>GitTopup</title>
</head>

<body class="font-rubik bg-neutral-700 relative">
    @include('sweetalert::alert')
    @include('layouts.navbar')

    @if (Request::is('order*', 'user*', 'dashboard*', 'inv*', 'check', 'faq', 'tentang', 'kebijakan-privasi', 'ketentuan-layanan'))
    <div class="container px-8 md:px-16 pt-28 pb-10 mx-auto">
        @yield('content')
    </div>
    @else
    @include('layouts.category')
    <div class="container px-8 md:px-16 my-10 mx-auto">
        @yield('content')
    </div>
    <section id="contact" class="w-full">
        <div class="container mx-auto px-5 sm:-x-8 md:px-12 lg:px-15 py-10 w-full bg-neutral-200">
            <div class="md:flex md:justify-between">
                <div class="contact-us w-full md:w-2/6">
                    <h3 class="md:text-2xl sm:text-xl text-lg font-bold">GitTopup</h3>
                    <p class="text-sm md:text-base">Dapatkan harga terbaik hanya di GitTopup, bisa di gunakan kapan pun dan dimana pun</p>
                    <ul class="mt-10 space-y-1">
                        <li class="text-neutral-800 text-sm md:text-base"><i class="fa-brands fa-instagram-square"></i> @gittopup.com</li>
                        <li class="text-neutral-800 text-sm md:text-base"><i class="fa-brands fa-whatsapp-square"></i> 081319841254</li>
                        <li class="text-neutral-800 text-sm md:text-base"><i class="fa-solid fa-map-location-dot"></i> Jakarta Barat, kelurahan Kamal, kecamatan Kalideres, Jalan Bhakti Pramuka RT 09 / RW 01 No 47</li>
                    </ul>
                </div>
                <div class="info mt-5 md:mt-0">
                    <h3 class="md:text-2xl sm:text-xl text-lg font-bold">Informasi</h3>
                    <ul class="mt-10 space-y-1">
                        <li class="text-neutral-800 hover:text-neutral-900 hover:font-medium text-sm md:text-base"><a href="/tentang">Tentang</a></li>
                        <li class="text-neutral-800 hover:text-neutral-900 hover:font-medium text-sm md:text-base"><a href="/kebijakan-privasi">Kebijakan Privasi</a></li>
                        <li class="text-neutral-800 hover:text-neutral-900 hover:font-medium text-sm md:text-base"><a href="/ketentuan-layanan">Ketentuan Layanan</a></li>
                    </ul>
                </div>
                <div class="payment mt-5 md:mt-0">
                    <h3 class="md:text-2xl sm:text-xl text-lg font-bold">Metode Pembayaran</h3>
                    <ul class="mt-10 flex flex-wrap items-center gap-x-3">
                            @foreach ($payments as $payment)
                            <li class="mt-1"><img src="{{ asset('storage/'  . $payment->image) }}" class="w-16" alt=""></li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="w-full py-4 bg-neutral-800">
        <h3 class="text-center text-xs md:text-sm font-medium text-neutral-200"><i class="fa-solid fa-copyright text-yellow-500"></i> Copyright by GitCode 2022</h3>
    </div>
    @endif

    <div class="fixed bottom-7 right-5 z-50">
        <a href="https://wa.me/089601648595" class="bg-green-400 block py-3 px-4 rounded-full"><i class="fa-brands fa-whatsapp text-2xl sm:3xl lg:text-4xl text-white"></i></a>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
    <script src="/js/all.js"></script>
</body>

</html>
