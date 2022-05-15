@extends('partials.main')

@section('content')
<div class="bg-neutral-400 w-full rounded-lg px-6 py-4 shadow-lg">
    <h3 class="mb-3 md:text-xl text-lg font-bold">Cek status transaksi anda</h3>
    <div class="bg-neutral-600 rounded-md w-full py-3 px-3 shadow-md">
        <form action="" method="post">
            @csrf
            <label for="" class="block md:text-base text-sm mb-1 text-neutral-100">Nomer kode transaksi</label>
            <div class="flex">
                <div class="px-3 py-1 rounded-l-md bg-neutral-300"><i class="fa-solid fa-receipt"></i></div>
                <input type="text" value="{{ session('data') ? session('data')['invoice'] : '' }}" name="invoice" placeholder="TRX000W9K.." class="block bg-neutral-200 focus:outline-none rounded-r-md px-3 py-1 w-full">
            </div>
            <button type="submit" class="block mt-1 ml-auto bg-blue-500 px-3 py-1 text-neutral-100 rounded-md"><i class="fa-solid fa-magnifying-glass"></i> Check</button>
        </form>
    </div>
    @if (session('data'))
    <div class="w-full overflow-x-auto mt-3 shadow-md">
        <table class="w-full">
            <thead class="bg-neutral-700">
                <tr class="text-left text-neutral-100 md:text-sm text-xs">
                    <th class="px-5 py-3">Kode Transaksi</th>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Item</th>
                    <th class="px-5 py-3">Nomor Pelanggan</th>
                    <th class="px-5 py-3">Total Harga</th>
                    <th class="px-5 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-5 py-3 bg-neutral-500 md:text-sm text-xs">{{ session('data')['invoice'] }}</td>
                    <td class="px-5 py-3 bg-neutral-500 md:text-sm text-xs">{{ session('data')['brand'] }}</td>
                    <td class="px-5 py-3 bg-neutral-500 md:text-sm text-xs">{{ session('data')['product'] }}</td>
                    <td class="px-5 py-3 bg-neutral-500 md:text-sm text-xs">{{ session('data')['customer_no'] }}</td>
                    <td class="px-5 py-3 bg-neutral-500 md:text-sm text-xs text-green-500 font-medium">{{ session('data')['grand_price'] }}</td>
                    <td class="px-5 py-3 bg-neutral-500">
                        @if (session('data')['status_id'] == 2)
                            @if (session('cek')['status'] == "Sukses")
                                <span class="block px-2.5 py-1 rounded-md text-xs md:text-sm bg-green-500 text-neutral-100 text-center">{{ session('cek')['status'] }}</span>
                            @elseif (session('cek')['status'] == "Pending")
                                <span class="block px-2.5 py-1 rounded-md text-xs md:text-sm bg-yellow-500 text-neutral-100 text-center">{{ session('cek')['status'] }}</span>
                            @elseif (session('cek')['status'] == "Gagal")
                                <div class="flex gap-x-2">
                                    <span class="block px-2.5 py-1 rounded-md text-xs md:text-sm bg-red-500 text-neutral-100 text-center">{{ session('cek')['status'] }}</span>
                                <a href="https://wa.me/089601648595" class="bg-blue-500 block px-2.5 py-1 rounded-md text-xs md:text-sm text-neutral-100">Chat Admin</a>
                                </div>
                            @endif
                        @elseif(session('data')['status_id'] == 1)
                        <span class="block px-2.5 py-1 rounded-md text-xs md:text-sm bg-blue-500 text-neutral-100 text-center">{{ session('data')['status']->name }}</span>
                        @elseif(session('data')['status_id'] == 3)
                        <span class="block px-2.5 py-1 rounded-md text-xs md:text-sm bg-red-500 text-neutral-100 text-center">{{ session('data')['status']->name }}</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif
    @if (session('error'))
        <div class="mt-3">
            <h3 class="text-center md:text-lg text-base">{{ session('error') }}</h3>
        </div>
    @endif
</div>
@endsection
