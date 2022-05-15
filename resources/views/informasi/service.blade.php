@extends('partials.main')

@section('content')
<div class="flex gap-x-5 mb-5 items-center">
    <div class="h-2 w-8 bg-blue-600 rounded-full"></div>
    <h3 class="block text-lg md:text-xl lg:text-2xl text-neutral-100">Ketentuan Layanan</h3>
</div>
<div class="w-full rounded bg-neutral-800 p-5">
    <ul class="text-neutral-100">
        <li class="ml-10">1. Harga layanan GitTopup dapat berubah sewaktu-waktu tanpa pemberitahuan anda.</li>
        <li class="ml-10">2. Pesanan dalam status success tidak dapat di refund.</li>
        <li class="ml-10">3. Kesalahan Penulisan Format bukan Tanggung Jawab Kami.</li>
        <li class="ml-10">4. Kesalahan Jumlah Transfer tidak sesuai  dengan ketentuan bukan Tanggung Jawab Kami.</li>
    </ul>
</div>
@endsection
