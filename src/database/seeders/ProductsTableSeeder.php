<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $spring = Season::firstOrCreate(['name' => '春']);
        $summer = Season::firstOrCreate(['name' => '夏']);
        $autumn = Season::firstOrCreate(['name' => '秋']);
        $winter = Season::firstOrCreate(['name' => '冬']);

        $product1 = Product::create([
                'name' => 'キウイ',
                'price' => '800',
                'image_path' => 'images/kiwi.png',
                'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです。ビタミンCなどの栄養素も豊富のため、美肌効果や疲労回復効果も期待できます。もぎたてフルーツのスムージーをお召し上がりください！'
                ]);

                $product1->seasons()->attach([$autumn->id, $winter->id]);

        $product2 = Product::create([
                'name' => 'ストロベリー',
                'price' => '1200',
                'image_path' => 'images/strawberry.png',
                'description' => '大人から子供まで大人気のストロベリー。当店では鮮度抜群の完熟いちごを使用しています。ビタミンCはもちろん食物繊維も豊富なため、腸内環境の改善も期待できます。もぎたてフルーツのスムージーをお召し上がりください！'
                ]);

                $product2->seasons()->attach([$spring->id]);

        $product3 = Product::create([
                'name' => 'オレンジ',
                'price' => '850',
                'image_path' => 'images/orange.png',
                'description' => '当店では酸味と甘みのバランスが抜群のネーブルオレンジを使用しています。酸味は控えめで、甘さと濃厚な果汁が魅力の商品です。もぎたてフルーツのスムージをお召し上がりください！'
                ]);

                $product3->seasons()->attach([$winter->id]);

        $product4 = Product::create([

                'name' => 'スイカ',
                'price' => '700',
                'image_path' => 'images/watermelon.png',
                'description' => '甘くてシャリシャリ食感が魅力のスイカ。全体の90％が水分のため、暑い日の水分補給や熱中症予防、カロリーが気になる方にもおすすめの商品です。もぎたてフルーツのスムージーをお召し上がりください！'
                ]);

                $product4->seasons()->attach([$summer->id]);

        $product5 = Product::create([
                'name' => 'ピーチ',
                'price' => '1000',
                'image_path' => 'images/peach.png',
                'description' => '豊潤な香りととろけるような甘さが魅力のピーチ。美味しさはもちろん見た目の可愛さも抜群の商品です。ビタミンEが豊富なため、生活習慣病の予防にもおすすめです。もぎたてフルーツのスムージーをお召し上がりください！'
                ]);

                $product5->seasons()->attach([$summer->id]);

        $product6 = Product::create([
                'name' => 'シャインマスカット',
                'price' => '1400',
                'image_path' => 'images/muscat.png',
                'description' => '爽やかな香りと上品な甘みが特長的なシャインマスカットは大人から子どもまで大人気のフルーツです。疲れた脳や体のエネルギー補給にも最適の商品です。もぎたてフルーツのスムージーをお召し上がりください！'
                ]);

                $product6->seasons()->attach([$summer->id,$autumn->id]);

        $product7 = Product::create([
                'name' => 'パイナップル',
                'price' => '800',
                'image_path' => 'images/pineapple.png',
                'description' => '甘酸っぱさとトロピカルな香りが特徴のパイナップル。当店では甘さと酸味のバランスが絶妙な国産のパイナップルを使用しています。もぎたてフルーツのスムージをお召し上がりください！'
                ]);

                $product7->seasons()->attach([$spring->id,$summer->id]);

        $product8 = Product::create([
                'name' => 'ブドウ',
                'price' => '1100',
                'image_path' => 'images/grapes.png',
                'description' => 'ブドウの中でも人気の高い国産の「巨峰」を使用しています。高い糖度と適度な酸味が魅力で、鮮やかなパープルで見た目も可愛い商品です。もぎたてフルーツのスムージーをお召し上がりください！'
                ]);

                $product8->seasons()->attach([$summer->id,$autumn->id]);

        $product9 = Product::create([
                'name' => 'バナナ',
                'price' => '600',
                'image_path' => 'images/banana.png',
                'description' => '低カロリーでありながら栄養満点のため、ダイエット中の方にもおすすめの商品です。1杯でバナナの濃厚な甘みを存分に堪能できます。もぎたてフルーツのスムージーをお召し上がりください！'
                ]);

                $product9->seasons()->attach([$summer->id]);

        $product10 = Product::create([
                'name' => 'メロン',
                'price' => '900',
                'image_path' => 'images/melon.png',
                'description' => '香りがよくジューシーで品のある甘さが人気のメロンスムージー。カリウムが多く含まれているためむくみ解消効果も抜群です。もぎたてフルーツのスムージーをお召し上がりください！'
                ]);

                $product10->seasons()->attach([$spring->id,$summer->id]);

    }

}

