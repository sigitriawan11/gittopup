@extends('partials.main')

@section('content')
    <div class="md:flex md:gap-x-5">
        <div class="bg-neutral-600 p-5 rounded-md w-full md:w-3/6 h-fit">
            <div class="image">
                <img src="{{ asset('storage/' . $brand->image) }}" class="w-36 sm:w-40 md:w-44 rounded-md shadow-md" alt="">
            </div>
            <div class="information mt-2">
                <h3 class="font-medium text-sm md:text-base text-neutral-400">Proses otomatis</h3>
                <p class="font-medium text-base md:text-lg mt-5 text-neutral-200"><i class="fa-solid fa-circle-info text-blue-400"></i> Sebelum melakukan transaksi harap masukan form transaksi
                    dengan <span class="font-bold">baik</span> supaya tidak terjadi hal hal yang tidak di ingin kan,
                    <span class="font-bold">proses otomatis !</span></p>
                <p class="font-medium text-base md:text-lg mt-5 text-neutral-200"><i class="fa-solid fa-circle-question text-yellow-600"></i><span class="font-bold"> Cara Order</span>
                    <span class="text-sm md:text-base block">
                        <p class="text-neutral-300"><span class="font-semibold ">1.</span> Lengkapi data anda</p>
                        <p class="text-neutral-300"><span class="font-semibold">2.</span> Pilih nominal</p>
                        <p class="text-neutral-300"><span class="font-semibold">3.</span> Pilih metode pembayaran</p>
                        <p class="text-neutral-300"><span class="font-semibold">4.</span> Klik order untuk mengecek data anda</p>
                        <p class="text-neutral-300"><span class="font-semibold">5.</span> Klik submit jika anda merasa data anda sudah benar</p>
                    </span>
                </p>
                <h3 class="font-medium text-sm md:text-base text-red-300 mt-5">NB : Layanan berwarna merah sedang tidak aktif !</h3>
            </div>
        </div>
        <div class="w-full mt-10 md:mt-0">
            <form action="" method="post" id="form_order" class="w-full">
                @csrf
                <div class="form_user w-full">
                    <div class="flex gap-x-3">
                        <div class="px-3 py-0.5 font-semibold text-neutral-100 rounded-md bg-blue-400 w-fit">1</div>
                        <span class="block font-semibold text-lg md:text-xl text-neutral-100">Lengkapi Data</span>
                    </div>
                    <div class="bg-neutral-600 p-5 rounded-md mt-1">
                        <div class="flex gap-x-3 items-center">
                            @if ($brand->multi_id)
                                <input type="text" name="first" class="rounded w-full bg-slate-200 px-3 py-1.5 focus:outline-none"
                                    placeholder="{{ $brand->multi->first }}" id="first">
                                <input type="text" name="second" class="rounded w-full bg-slate-200 px-3 py-1.5 focus:outline-none"
                                    placeholder="{{ $brand->multi->second }}" id="second">
                            @else
                                <input type="text" name="first" class="rounded w-3/6 bg-slate-200 px-3 py-1.5 focus:outline-none" id="first"
                                    placeholder="user_id">
                            @endif
                        </div>
                    </div>
                </div>
                @if (Request::is('order/life-after'))
                <h3 class="text-gray-100 mt-3"><span class="block">-list kode server :</span>
                        <span class="block">MiskaTown (NA)	500001</span>
                        <span class="block">SandCastle (NA)	500002</span>
                        <span class="block">MouthSwamp (NA)	500003</span>
                        <span class="block">RedwoodTown (NA)500004</span>
                        <span class="block">Obelisk (NA)	500005</span>
                        <span class="block">ChaosOutpost (NA)500007</span>
                        <span class="block">IronStride (NA)	500008</span>
                        <span class="block">FallForest (AU)	510001</span>
                        <span class="block">MountSnow (AU)	510002</span>
                        <span class="block">NancyCity (SEA)	520001</span>
                        <span class="block">CharlesTown (SEA)520002</span>
                        <span class="block">SnowHighlands(SEA) 520003</span>
                        <span class="block">Santopany (SEA)	520004</span>
                        <span class="block">LevinCity (SEA)	520005</span>
                        <span class="block">ChaosCity (SEA)	520007</span>
                        <span class="block">TwinIslands (SEA) 520008</span>
                        <span class="block">HopeWall (SEA)	520009</span>
                        <span class="block">NewLand (NA)	500006</span>
                        <span class="block">MileStone (SEA)	520006</span>
                </h3>
                @endif
                <div class="form_nominal mt-10">
                    <div class="flex gap-x-3">
                        <div class="px-3 py-0.5 font-semibold text-neutral-100 rounded-md bg-blue-400 w-fit">2</div>
                        <span class="block font-semibold text-lg md:text-xl text-neutral-100">Pilih Nominal</span>
                    </div>
                    <div class="bg-neutral-600 p-5 rounded-md mt-1">
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-x-3">
                            @foreach ($products as $product)
                            <div class="mt-2">
                                <input type="radio" name="item_select" id="{{ $product->id }}" class=" peer hidden" />
                                <label for="{{ $product->id }}"
                                    class="block {{ $balance['deposit'] < $product->price ? 'bg-red-400 hover:bg-red-500' : 'bg-slate-200 hover:bg-slate-300' }} item-select text-xs md:text-sm  duration-200 ease-in-out rounded-md cursor-pointer select-none px-3 py-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white" data-id="{{ $product->id }}" data-code="{{ $product->product_code }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" >{{ Str::title(Str::lower($product->name)) }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form_metode_pembayaran mt-10">
                    <div class="flex gap-x-3">
                        <div class="px-3 py-0.5 font-semibold text-neutral-100 rounded-md bg-blue-400 w-fit">3</div>
                        <span class="block font-semibold text-lg md:text-xl text-neutral-100">Metode Pembayaran</span>
                    </div>
                    <div class="w-full">
                        @foreach ($payments as $payment)
                        <div class="mt-2">
                            <input type="radio" name="metode" id="{{ $payment->name }}" class="peer hidden" />
                            <label for="{{ $payment->name }}"
                                class="block bg-slate-200 payment-select text-xs md:text-sm hover:bg-slate-300 duration-200 ease-in-out rounded-md cursor-pointer select-none px-3 py-5 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white" data-payment="{{ $payment->id }}" data-name="{{ $payment->name }}">
                                <div class="flex items-center justify-between">
                                    <div class="image-payment">
                                        <img src="{{ asset('storage/' . $payment->image) }}" class="w-20 md:w-24" alt="">
                                    </div>
                                    <div class="price">
                                        <span class="total_price font-semibold text-base sm:text-lg lg:text-xl">Rp. 0</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" name="product" id="product">
                <input type="hidden" name="brand" value="{{ $products[0]->brand->name }}">
                <input type="hidden" name="code" id="code">
                <input type="hidden" name="price" id="price">
                <input type="hidden" name="payment" id="payment" >
                <div class="confirm_order mt-2">
                    <button type="button" class="w-full px-5 rounded-md text-sm font-medium sm:text-base md:text-lg text-neutral-100 py-4 hover:bg-blue-500 bg-blue-400" id="check_form">ORDER</button>
                </div>
            </form>
        </div>
    </div>
@endsection
