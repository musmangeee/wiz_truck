<?php

use App\Product;
use App\Category;
use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
                'name' => 'CHICKEN SANDWITCH',
                'description' => 'Fast Food',
                'price' => '200',
                'menu_id' => '1',
                'image' => 'img5.jpg',
                'discount' => '',
            ],
            [
                'name' => 'CLUB SANDWITCH',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '1',
                'image' => 'img7.jpg',
                'discount' => '',
            ],
            [
                'name' => 'GRILLED BREAST SANDWITCH',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '2',
                'image' => 'img6.jpg',
                'discount' => '',
            ],
            [
                'name' => 'FRIED CHICKEN BREAST SANDWITCH',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '2',
                'image' => 'img5.jpg',
                'discount' => '',
            ],
            [
                'name' => 'STEAK SANDWITCH CHICKEN',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '3',
                'image' => 'img6.jpg',
                'discount' => '',
            ],
            [
                'name' => 'ROASTED SANDWITCH CHICKEN',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '3',
                'image' => 'img6.jpg',
                'discount' => '',
            ],
            [
                'name' => 'ROASTED SANDWITCH BEEF',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '4',
                'image' => 'img7.jpg',
                'discount' => '',
            ],
            [
                'name' => 'HOT N SPICY SANDWITCH',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '4',
                'image' => 'img5.jpg',
                'discount' => '',
            ],
            [
                'name' => 'CORDON BLUE SANDWITCH',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '5',
                'image' => 'img7.jpg',
                'discount' => '',
            ],
            [
                'name' => 'SPECIAL SANDWITCH',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '5',
                'image' => 'img7.jpg',
                'discount' => '',
            ],
            [
                'name' => 'BBQ MALAI TIKKA SANDWITCH',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '6',
                'image' => 'img6.jpg',
                'discount' => '',
            ],
            [
                'name' => 'MEXICAN CHICKEN SANDWITCH',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '6',
                'image' => 'img5.jpg',
                'discount' => '',
            ],
            [
                'name' => 'BEEF BURGER ',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '7',
                'image' => 'img4.jpg',
                'discount' => '',
            ],
            [
                'name' => 'CHICKEN BURGER',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '7',
                'image' => 'img1.jpg',
                'discount' => '',
            ],
            [
                'name' => 'MALIK BURGER',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '8',
                'image' => 'img2.jpg',
                'discount' => '',
            ],
            [
                'name' => 'GRILLED BREAST BURGER',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '8',
                'image' => 'img4.jpg',
                'discount' => '',
            ],
            [
                'name' => 'FRIED BREAST BURGER',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '9',
                'image' => 'img1.jpg',
                'discount' => '',
            ],
            [
                'name' => 'STEAK BURGER CHICKEN',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '9',
                'image' => 'img3.jpg',
                'discount' => '',
            ],
            [
                'name' => 'STEAK BURGER BEEF',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '10',
                'image' => 'img2.jpg',
                'discount' => '',
            ],
            [
                'name' => 'CORDON BLUE BURGER',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '10',
                'image' => 'img4.jpg',
                'discount' => '',
            ],
            [
                'name' => 'ZINGER BURGER',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '11',
                'image' => 'img3.jpg',
                'discount' => '',
            ],
            [
                'name' => 'HOT N SPICY BURGER',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '12',
                'image' => 'img2.jpg',
                'discount' => '',
            ],
            [
                'name' => 'DOUBLE DECKER BURGER',
                'description' => 'Healthy',
                'price' => '100',
                'menu_id' => '12',
                'image' => 'img1.jpg',
                'discount' => '',
            ],
            

        ];

        foreach ($products as $product) {
            $product = Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'menu_id' => $product['menu_id'],
                'image' => $product['image'],
                'discount' => $product['discount'],

            ]);

            $products = new ProductCategory();
            $products -> product_id = $products->id;
            $products -> category_id = rand(1, sizeof(Category::all()));
            $products -> save();
        }
    }
}
