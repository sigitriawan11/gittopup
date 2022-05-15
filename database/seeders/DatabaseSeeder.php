<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Multi;
use App\Models\Status;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sigit Riawan',
            'email' => 'fcpanjul6@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Admin'
        ]);


        Category::create([
            'user_id' => 1,
            'name' => 'Games',
            'slug' => 'game',
            'icon_awesome' => '<i class="fa-solid fa-gamepad"></i>'
        ]);
        Category::create([
            'user_id' => 1,
            'name' => 'Pulsa',
            'slug' => 'pulsa',
            'icon_awesome' => '<i class="fa-solid fa-mobile-screen"></i>'
        ]);
        Category::create([
            'user_id' => 1,
            'name' => 'Internet',
            'slug' => 'internet',
            'icon_awesome' => '<i class="fa-solid fa-wifi"></i>'
        ]);
        Category::create([
            'user_id' => 1,
            'name' => 'Voucher',
            'slug' => 'voucher',
            'icon_awesome' => '<i class="fa-solid fa-ticket"></i>'
        ]);
        Category::create([
            'user_id' => 1,
            'name' => 'PLN',
            'slug' => 'pln',
            'icon_awesome' => '<i class="fa-solid fa-bolt"></i>'
        ]);

        Multi::create([
            'game' => 'Mobile Legend',
            'first' => 'user_id',
            'second' => 'zone_id'
        ]);

        Multi::create([
            'game' => 'Valorant',
            'first' => 'riot_id',
            'second' => 'tagline'
        ]);

        Brand::create([
            'multi_id' => 1,
            'category_id' => 1,
            'name' => 'Mobile Legend',
            'slug' => 'mobile-legend',
            'image' => 'image/ml.png'
        ]);
        Brand::create([
            'category_id' => 1,
            'name' => 'Free Fire',
            'slug' => 'free-fire',
            'image' => 'image/ff.png'
        ]);
        Brand::create([
            'multi_id' => 2,
            'category_id' => 1,
            'name' => 'Valorant',
            'slug' => 'valorant',
            'image' => 'image/valo.png'
        ]);

        Brand::create([
            'category_id' => 1,
            'name' => 'Pubg Mobile',
            'slug' => 'pubg-mobile',
            'image' => 'image/pubgm.png'
        ]);

        Brand::create([
            'category_id' => 1,
            'name' => 'Genshin Impact',
            'slug' => 'genshin-impact',
            'image' => 'image/gi.webp'
        ]);

        Brand::create([
            'category_id' => 1,
            'name' => 'LOL Wild Rift',
            'slug' => 'league-of-legends-wild-rift',
            'image' => 'image/lolwr.png'
        ]);

        Brand::create([
            'category_id' => 1,
            'name' => 'Point Blank',
            'slug' => 'point-blank',
            'image' => 'image/pb.png'
        ]);

        Brand::create([
            'category_id' => 1,
            'name' => 'Arena Of Valor',
            'slug' => 'arena-of-valor',
            'image' => 'image/aov.png'
        ]);

        Brand::create([
            'category_id' => 1,
            'name' => 'LifeAfter Credit',
            'slug' => 'life-after',
            'image' => 'image/la.png'
        ]);

        Brand::create([
            'category_id' => 1,
            'name' => 'Sausage Man',
            'slug' => 'sausage-man',
            'image' => 'image/sm.webp'
        ]);
        Brand::create([
            'category_id' => 1,
            'name' => 'Jade Dynasty',
            'slug' => 'jade-dynasty',
            'image' => 'image/jd.webp'
        ]);
        Brand::create([
            'category_id' => 1,
            'name' => 'Bleach Mobile 3D',
            'slug' => 'bleach-mobile-3d',
            'image' => 'image/bm3d.png'
        ]);
        Brand::create([
            'category_id' => 1,
            'name' => 'Love Nikki',
            'slug' => 'love-nikki',
            'image' => 'image/lovenikki.webp'
        ]);

        Brand::create([
            'category_id' => 1,
            'name' => 'Lords Mobile',
            'slug' => 'lords-mobile',
            'image' => 'image/lordsm.webp'
        ]);
        Brand::create([
            'category_id' => 1,
            'name' => 'Laplace M',
            'slug' => 'laplace-m',
            'image' => 'image/laplace.webp'
        ]);
        Brand::create([
            'category_id' => 1,
            'name' => 'Ragnarok M: <span class="block">Eternal Love</span>',
            'slug' => 'ragnarok-m-eternal-love',
            'image' => 'image/ragnarok.png'
        ]);


        foreach(getProductGames() as $product){
            if($product['brand'] == "MOBILE LEGEND"){
                Product::create([
                    'brand_id' => 1,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }

            if($product['brand'] == "FREE FIRE"){
                Product::create([
                    'brand_id' => 2,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }

            if($product['brand'] == "Valorant"){
                Product::create([
                    'brand_id' => 3,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }

            if($product['brand'] == "PUBG MOBILE"){
                Product::create([
                    'brand_id' => 4,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }

            if($product['brand'] == "Genshin Impact"){
                Product::create([
                    'brand_id' => 5,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }

            if($product['brand'] == "League of Legends Wild Rift"){
                Product::create([
                    'brand_id' => 6,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }

            if($product['brand'] == "ARENA OF VALOR"){
                Product::create([
                    'brand_id' => 8,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }

            if($product['brand'] == "POINT BLANK"){
                Product::create([
                    'brand_id' => 7,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }

            if($product['brand'] == "LifeAfter Credits"){
                Product::create([
                    'brand_id' => 9,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }
            if($product['brand'] == "Sausage Man"){
                Product::create([
                    'brand_id' => 10,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }
            if($product['brand'] == "Jade Dynasty"){
                Product::create([
                    'brand_id' => 11,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }
            if($product['brand'] == "Bleach Mobile 3D"){
                Product::create([
                    'brand_id' => 12,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }
            if($product['brand'] == "Love Nikki"){
                Product::create([
                    'brand_id' => 13,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }
            if($product['brand'] == "Lords Mobile"){
                Product::create([
                    'brand_id' => 14,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }
            if($product['brand'] == "Laplace M"){
                Product::create([
                    'brand_id' =>  15,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }
            if($product['brand'] == "Ragnarok M: Eternal Love"){
                Product::create([
                    'brand_id' =>  16,
                    'category_id'=> 1,
                    'product_code' => $product['buyer_sku_code'],
                    'name' => $product['product_name'],
                    'desc' => $product['desc'],
                    'price' => $product['price']
                ]);
            }
        }

        Status::create([
            'name' => 'Not Paid'
        ]);
        Status::create([
            'name' => 'Pending'
        ]);
        Status::create([
            'name' => 'Success'
        ]);
        Status::create([
            'name' => 'Error'
        ]);
        Payment::create([
            'no' => '089601648595',
            'owner' => 'Sigit Riawan',
            'name' => 'GoPay',
            'image' => 'image/gopay.png'
        ]);
        Payment::create([
            'no' => '089601648595',
            'owner' => 'Sigit Riawan',
            'name' => 'OVO',
            'image' => 'image/ovo.png'
        ]);
    }
}
