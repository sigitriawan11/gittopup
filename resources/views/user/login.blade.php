@extends('partials.main')

@section('content')
<div class="flex justify-center">
    <div class="bg-neutral-400 rounded-md px-6 py-4 w-4/6 sm:w-3/6 lg:w-2/6">
        <h3 class="font-semibold text-xl md:text-2xl text-neutral-800 text-center">Silahkan Login</h3>
        <div class="flex justify-center h-1 rounded-full w-full bg-black my-5"></div>
        <form action="{{ route('login-request') }}" method="POST">
            @csrf
            <div class="flex items-center">
                <span class="block rounded-l-md px-2.5 py-1 bg-neutral-300"><i class="fa-solid fa-envelope"></i></span>
                <input type="text" class="block py-1 px-2.5 focus:outline-none  rounded-r-md bg-neutral-100 w-full" placeholder="Email" name="email" required>
            </div>
            <div class="flex items-center mt-3">
                <span class="block rounded-l-md px-2.5 py-1 bg-neutral-300"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="block py-1 px-2.5 focus:outline-none  rounded-r-md bg-neutral-100 w-full" placeholder="Password" name="password" required>
            </div>
            <button class="mt-3 px-2.5 py-1.5 bg-blue-400 hover:bg-blue-500 duration-200 ease-in-out rounded-md text-neutral-50"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</button>
            <div class="flex items-center justify-between mt-3">
                <a href="" class="md:text-sm text-xs text-blue-700 hover:text-blue-800 block">Belum punya akun ?</a>
                <a href="" class="md:text-sm text-xs text-blue-700 hover:text-blue-800 block">Lupa password</a>
            </div>
        </form>
    </div>
</div>
@endsection
