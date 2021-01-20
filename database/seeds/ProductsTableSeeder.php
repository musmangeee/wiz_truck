
<?php


use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('products')->delete();

        \DB::table('products')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'CHICKEN SANDWITCH',
                'description' => 'Fast Food',
                'price' => 200.0,
                'discount' => '',
                'menu_id' => 2,
                'in_stock' => 1,
                'image' => 'img5.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'CLUB SANDWITCH',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 2,
                'in_stock' => 1,
                'image' => 'img7.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'GRILLED BREAST SANDWITCH',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 2,
                'in_stock' => 1,
                'image' => 'img6.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'FRIED CHICKEN BREAST SANDWITCH',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 2,
                'in_stock' => 1,
                'image' => 'img5.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'STEAK SANDWITCH CHICKEN',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 3,
                'in_stock' => 1,
                'image' => 'img6.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'ROASTED SANDWITCH CHICKEN',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 3,
                'in_stock' => 1,
                'image' => 'img6.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'ROASTED SANDWITCH BEEF',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 4,
                'in_stock' => 1,
                'image' => 'img7.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'HOT N SPICY SANDWITCH',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 4,
                'in_stock' => 1,
                'image' => 'img5.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'CORDON BLUE SANDWITCH',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 5,
                'in_stock' => 1,
                'image' => 'img7.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'SPECIAL SANDWITCH',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 5,
                'in_stock' => 1,
                'image' => 'img7.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'BBQ MALAI TIKKA SANDWITCH',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 6,
                'in_stock' => 1,
                'image' => 'img6.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'MEXICAN CHICKEN SANDWITCH',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 6,
                'in_stock' => 1,
                'image' => 'img5.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'BEEF BURGER ',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 7,
                'in_stock' => 1,
                'image' => 'img4.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'CHICKEN BURGER',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 7,
                'in_stock' => 1,
                'image' => 'img1.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'MALIK BURGER',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 8,
                'in_stock' => 1,
                'image' => 'img2.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'GRILLED BREAST BURGER',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 8,
                'in_stock' => 1,
                'image' => 'img4.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'FRIED BREAST BURGER',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 9,
                'in_stock' => 1,
                'image' => 'img1.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'STEAK BURGER CHICKEN',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 9,
                'in_stock' => 1,
                'image' => 'img3.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'STEAK BURGER BEEF',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 10,
                'in_stock' => 1,
                'image' => 'img2.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'CORDON BLUE BURGER',~
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 10,
                'in_stock' => 1,
                'image' => 'img4.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'ZINGER BURGER',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 11,
                'in_stock' => 1,
                'image' => 'img3.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'HOT N SPICY BURGER',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 12,
                'in_stock' => 1,
                'image' => 'img2.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'DOUBLE DECKER BURGER',
                'description' => 'Healthy',
                'price' => 100.0,
                'discount' => '',
                'menu_id' => 12,
                'in_stock' => 1,
                'image' => 'img1.jpg',
                'created_at' => '2021-01-19 13:28:40',
                'updated_at' => '2021-01-19 13:28:40',
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'La Choco',
                'description' => 'Nutella with freshly-sliced Strawberries, Banana or both; drizzled with Nutella Syrup',
                'price' => 7.0,
                'discount' => '1.0',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110651041634265558.png',
                'created_at' => '2021-01-19 14:05:04',
                'updated_at' => '2021-01-19 14:05:04',
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'La Crème De La Crème',
                'description' => 'Sweetened Cream Cheese & freshly-sliced Strawberries, Banana or both',
                'price' => 7.0,
                'discount' => '2.00',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110656071634288841.png',
                'created_at' => '2021-01-19 14:13:27',
                'updated_at' => '2021-01-19 14:13:27',
            ),
            25 =>
            array (
                'id' => 26,
                'name' => 'The Jammin’',
                'description' => 'An irresistible crêpe filled with “Bonne Maman” Jam',
                'price' => 7.0,
                'discount' => '2.00',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110657991634298043.png',
                'created_at' => '2021-01-19 14:16:39',
                'updated_at' => '2021-01-19 14:16:39',
            ),
            26 =>
            array (
                'id' => 27,
                'name' => 'Simply Nutella',
                'description' => 'Chocolate lovers look no further! Our warm, fresh-made crêpe with 
Nutella, drizzled with Nutella syrup',
                'price' => 6.0,
                'discount' => '1.00',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110658601634295447.png',
                'created_at' => '2021-01-19 14:17:41',
                'updated_at' => '2021-01-19 14:17:41',
            ),
            27 =>
            array (
                'id' => 28,
                'name' => 'La Classique',
            'description' => 'Ham, Mixed Cheese (mozzarella, parmesan, and provolone) with homemade 
Béchamel',
                'price' => 9.0,
                'discount' => '2.00',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110659121634268640.png',
                'created_at' => '2021-01-19 14:18:32',
                'updated_at' => '2021-01-19 14:18:32',
            ),
            28 =>
            array (
                'id' => 29,
                'name' => 'La Crêpe Marine',
                'description' => 'Smoked Atlantic Salmon, Spring Mix Salad , Fresh Onions & Tomatoes, Cappers with Dill Sauce',
                'price' => 13.0,
                'discount' => '2.00',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110659551634295587.png',
                'created_at' => '2021-01-19 14:19:15',
                'updated_at' => '2021-01-19 14:19:15',
            ),
            29 =>
            array (
                'id' => 30,
                'name' => 'Miss Vickie’s Chips',
                'description' => 'Jalapeño, Sea salt, Sea salt & Vinegar, or Smokehouse BBQ',       
                'price' => 1.0,
                'discount' => '0.00',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110659941435110914.jpg',
                'created_at' => '2021-01-19 14:19:54',
                'updated_at' => '2021-01-19 14:19:54',
            ),
            30 =>
            array (
                'id' => 31,
                'name' => 'The German',
                'description' => 'Smoked Sausage, Potatoes, Sauerkraut with Blanquette Sauce',      
                'price' => 12.0,
                'discount' => '2.00',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110660391634302366.png',
                'created_at' => '2021-01-19 14:20:39',
                'updated_at' => '2021-01-19 14:20:39',
            ),
            31 =>
            array (
                'id' => 32,
                'name' => 'The Italian',
            'description' => 'Prosciutto, Fresh Onions & Tomatoes, Mixed Cheese (parmesan, mozzarella, and provolone) with Béchamel Sauce',
                'price' => 11.0,
                'discount' => '1.00',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110660851634300510.png',
                'created_at' => '2021-01-19 14:21:25',
                'updated_at' => '2021-01-19 14:21:25',
            ),
            32 =>
            array (
                'id' => 33,
                'name' => 'The Texan',
            'description' => 'Smoked Pulled Pork, Parmesan, Mixed Cheese (mozzarella, parmesan, provolone), Pico de Gallo  with Blanquette sauce',
                'price' => 12.0,
                'discount' => '1.00',
                'menu_id' => 1,
                'in_stock' => 1,
                'image' => '16110661321634302366.png',
                'created_at' => '2021-01-19 14:22:12',
                'updated_at' => '2021-01-19 14:22:12',
            ),
        ));


    }
}