<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$products = [
    		[
    			'name' => "MEN'S BETTER THAN NAKED&trade; JACKET",
				'description' => "Flight Series™ performance running gear is race-day ready, and a pure 
				example of athlete-lead, progressive design",
    			'units' => 21,
    			'price' => 2000.10,
    			'image' => "http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/mens-better-than-naked-jacket-AVMH_LC9_hero.png"
    		],
    		[
    			'name' => "WOMEN'S BETTER THAN NAKED&trade; JACKET",
				'description' => "Our lightest wind- and water-resistant running jacket, this technical 
				zip-up features body-mapped vents to keep you cool while blocking out the elements",
    			'units' => 400,
    			'price' => 1600.21,
    			'image' => "http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-better-than-naked-jacket-AVKL_NN4_hero.png"
    		],
    		[
    			'name' => "WOMEN'S SINGLE-TRACK SHOE",
				'description' => "Guided by the Japanese word for speed, our designers created these ultralight
				 running shoes in collaboration with a world-renowned athlete",
    			'units' => 37,
    			'price' => 3790.00,
    			'image' => "http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-single-track-shoe-ALQF_JM3_hero.png"
    		],
    		[
    			'name' => "Enduro Boa&reg; Hydration Pack",
				'description' => "Thirsty runners listen up: This new technical hydration pack minimizes 
				abrasion at the shoulders and back by redistributing weight across the upper body.",
    			'units' => 10,
    			'price' => 2100.10,
    			'image' => "http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/enduro-boa-hydration-pack-AJQZ_JK3_hero.png"
    		]
    	];

    	foreach ($products as $product) {
    		Product::create($product);
    	}

    }
}