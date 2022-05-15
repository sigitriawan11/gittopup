@extends('partials.main')

@section('content')

<div class="flex justify-center">
    <div class="bg-neutral-400 w-full rounded-lg px-6 py-4 shadow-lg">
        <div class="">
            <h3 class="text-lg sm:text-xl lg:text-2xl block">Kode Transaksi : {{ $order->invoice }}</h3>
            <small class="text-xs md:text-sm text-red-600">Salin kode transaksi tersebut dan cek status pesanan anda di Check Invoice</small>
        </div>

        <h3 class="text-sm sm:text-base md:text-lg mt-20 block">Tanggal : {{ $order->created_at }}</h3>
        <div class="w-full bg-blue-400 shadow-md rounded-md text-neutral-50 font-semibold px-5 py-2 mb-3 text-center">Harap transfer sesuai dengan total harga di bawah tersebut agar di proses otomatis</div>
        <div class=" w-full overflow-x-auto shadow-md">
            <table class="w-full">
                <thead class="bg-neutral-800">
                    <tr class="text-left text-neutral-300">
                        <th class="px-5 py-3 text-sm md:text-base">Kategori</th>
                        <th class="px-5 py-3 text-sm md:text-base">Barang</th>
                        <th class="px-5 py-3 text-sm md:text-base">Nomor Pelanggan</th>
                        <th class="px-5 py-3 text-sm md:text-base">Metode Pembayaran</th>
                    </tr>
                </thead>
                <tbody class="bg-neutral-500">
                    <tr>
                        <td class="px-5 py-3 text-sm md:text-base">{{ $order->brand }}</td>
                        <td class="px-5 py-3 text-sm md:text-base">{{ $order->product }}</td>
                        <td class="px-5 py-3 text-sm md:text-base">{{ $order->customer_no }}</td>
                        <td class="px-5 py-3 text-sm md:text-base"><img src="{{ asset('storage/' . $order->payment->image) }}" class="w-16" alt=""></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="md:flex md:gap-x-5 mt-10 shadow-md">
            <div class="px-3 py-2 bg-neutral-500 rounded-md md:w-5/6 lg:w-full">
                <p class="text-sm sm:text-base md:text-lg">
                    <span class="block text-xl md:text-2xl font-bold"><i class="fa-solid fa-circle-info text-yellow-600  "></i> Informasi</span>
                    Harap melakukan transfer sesuai <span class="font-bold">Total Harga</span> yang harus di bayar ke nomor <span class="font-bold">{{ $order->payment->no }}</span> A/n <span class="font-bold">
                        {{ $order->payment->owner }}
                    </span> supaya transaksi anda di <span class="font-bold">Proses Otomatis</span>
                </p>
            </div>
            <div class=" w-full overflow-x-auto mt-3 md:mt-0 shadow-md">
                <table class="w-full">
                    <thead class="bg-neutral-800">
                        <tr class="text-left text-neutral-300">
                            <th class="px-5 py-3 text-sm md:text-base">#</th>
                            <th class="px-5 py-3 text-sm md:text-base">Harga</th>
                        </tr>
                    </thead>
                    <tbody class="bg-neutral-500">
                        <tr class=" border-b-2 border-neutral-700">
                            <td class="px-5 py-3 text-sm md:text-base">Harga Barang</td>
                            <td class="px-5 py-3 text-sm md:text-base">Rp. {{ number_format($order->price,0,',','.') }}</td>
                        </tr>
                        <tr class="border-b-2 border-neutral-700">
                            <td class="px-5 py-3 text-sm md:text-base">Biaya Admin</td>
                            <td class="px-5 py-3 text-sm md:text-base">Rp. {{ number_format($order->tax,0,',','.') }}</td>
                        </tr>
                        <tr class="border-b-2 border-neutral-700">
                            <td class="px-5 py-3 text-sm md:text-base font-bold text-green-500">Total Harga</td>
                            <td class="px-5 py-3 text-sm md:text-base text-green-500 font-bold">Rp. {{ number_format($order->grand_price,0,',','.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
