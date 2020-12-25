<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->truncate();

        $categories = [
            ['name' => 'Burger','icon' => 'fas fa-hamburger','image' => 'food2.jpg'],
            ['name' => 'Food','icon' => 'fa fa-utensils','image' => 'food1.jpg'],
            ['name' => 'Pizza','icon' => 'fas fa-pizza-slice','image' => 'food.jpg'],
            ['name' => 'Restaurant','icon' => 'fa fa-home','image' => 'food4.png'],
            // ['name' => 'Industry','icon' => 'fa fa-industry','image' => 'food.png'],
            // ['name' => 'Mining','icon' => 'fa fa-hammer','image' => 'food1.jpg'],
            // ['name' => 'Oil & Gas','icon' => 'fas fa-oil-can','image' => 'food2.jpg'],
            // ['name' => 'Pizza','icon' => 'fas fa-farm','image' => 'food3.jpg'],
        ];

        \Illuminate\Support\Facades\DB::table('categories')->insert($categories);

        $categories = [
            ["parent_id" => 1,"name" => "Provisions/Groceries shops"],
            ["parent_id" => 1,"name" => "Pharmacy Shops"],
            ["parent_id" => 1,"name" => "Chemical Shops"],
            ["parent_id" => 1,"name" => "Sellers of Household Items"],
            ["parent_id" => 1,"name" => "Sellers of Durable Household Products"],
            ["parent_id" => 1,"name" => "Online Stores"],
            ["parent_id" => 1,"name" => "Importers"],
            ["parent_id" => 1,"name" => "Exporters"],
            ["parent_id" => 1,"name" => "Spare Parts Dealers"],
            ["parent_id" => 1,"name" => "Food/Agricultural Commodities Sellers "],
            ["parent_id" => 1,"name" => "Sellers Phones and Accessories"],
            ["parent_id" => 1,"name" => "Sellers of Gadgets and Accessories "],
            ["parent_id" => 1,"name" => "Supermarkets"],
            ["parent_id" => 1,"name" => "Sellers of Appliances and Electronics"],
            ["parent_id" => 1,"name" => "Sellers Food Products and Ingredients"],
            ["parent_id" => 1,"name" => "Drinks and Beverages Sellers"],
            ["parent_id" => 1,"name" => "Dealers of Building Materials"],
            ["parent_id" => 1,"name" => "Processed Food Sellers "],
            ["parent_id" => 1,"name" => "Dealers of Machinery and Heavy Duty Equipment"],
            ["parent_id" => 1,"name" => "Sellers of Clothing & Accessories "],
            ["parent_id" => 1,"name" => "Traders of Cosmetics and Hair Products"],
            ["parent_id" => 1,"name" => "Car and Other Vehicle Sellers"],
            ["parent_id" => 1,"name" => "Wholesalers"],
            ["parent_id" => 1,"name" => "Retailers"],
            ["parent_id" => 1,"name" => "Traders of Consumer Goods "],
            ["parent_id" => 1,"name" => "Other products"],
            ["parent_id" => 2,"name" => "Chinese dishes"],
            ["parent_id" => 2,"name" => "Continental dishes"],
            ["parent_id" => 2,"name" => "Italian dishes"],
            ["parent_id" => 2,"name" => "Spanish Dishes"],
            ["parent_id" => 2,"name" => "Middle Eastern Dishes"],
            ["parent_id" => 2,"name" => "Nigerian Dishes"],
            ["parent_id" => 2,"name" => "Ivorian Dishes)"],
            ["parent_id" => 2,"name" => "Fast Foods"],
            ["parent_id" => 2,"name" => "Food Joints"],
            ["parent_id" => 2,"name" => "Chop Bars"],
            ["parent_id" => 2,"name" => "Other Food Sellers"],
            ["parent_id" => 3,"name" => "Banks"],
            ["parent_id" => 3,"name" => "Savings and Loans"],
            ["parent_id" => 3,"name" => "Insurance"],
            ["parent_id" => 3,"name" => "Rural Banks"],
            ["parent_id" => 3,"name" => "Micro-finance Companies"],
            ["parent_id" => 3,"name" => "Other Financial Services"],
            ["parent_id" => 3,"name" => "Telecommunication Companies"],
            ["parent_id" => 3,"name" => "Utilities Companies"],
            ["parent_id" => 3,"name" => "Hair salons"],
            ["parent_id" => 3,"name" => "Beauty and Personal Care"],
            ["parent_id" => 3,"name" => "Health Care"],
            ["parent_id" => 3,"name" => "Hospitals/Clinics"],
            ["parent_id" => 3,"name" => "Schools"],
            ["parent_id" => 3,"name" => "Religious Organizations"],
            ["parent_id" => 3,"name" => "Servicing of Cars and Other Vehicles"],
            ["parent_id" => 3,"name" => "Servicing of Heavy Duty Equipment"],
            ["parent_id" => 3,"name" => "Media and Broadcasting Companies"],
            ["parent_id" => 3,"name" => "Entertainment"],
            ["parent_id" => 3,"name" => "Internet Providers"],
            ["parent_id" => 3,"name" => "Travel & Tours"],
            ["parent_id" => 3,"name" => "Technology-based Companies"],
            ["parent_id" => 3,"name" => "Mobile App Companies"],
            ["parent_id" => 3,"name" => "Advertising and Marketing Companies"],
            ["parent_id" => 3,"name" => "Transportation"],
            ["parent_id" => 3,"name" => "Packaging companies"],
            ["parent_id" => 3,"name" => "Government Activities/Agencies"],
            ["parent_id" => 3,"name" => "Consultancy"],
            ["parent_id" => 3,"name" => "Agent services"],
            ["parent_id" => 3,"name" => "General Consumer Services"],
            ["parent_id" => 3,"name" => "Other Services"],
            ["parent_id" => 4,"name" => "Houses/Apartments "],
            ["parent_id" => 4,"name" => "Lands for sale or rent"],
            ["parent_id" => 4,"name" => "Hotels"],
            ["parent_id" => 4,"name" => "selling or leasing of Shops"],
            ["parent_id" => 4,"name" => "Warehouses and Offices for sale/rent"],
            ["parent_id" => 4,"name" => "Short term stays"],
            ["parent_id" => 5,"name" => "Factories and all forms of Manufacturing"],
            ["parent_id" => 5,"name" => "Assembling of Components"],
            ["parent_id" => 5,"name" => "Energy Production"],
            ["parent_id" => 5,"name" => "Heavy Construction"],
            ["parent_id" => 5,"name" => "Building of homes/offices/ shopping complexes"],
            ["parent_id" => 6,"name" => "Mining of various minerals and natural resources"],
            ["parent_id" => 6,"name" => "Support Services"],
            ["parent_id" => 6,"name" => "Heavy duty equipment rentals"],
            ["parent_id" => 7,"name" => "Upstream"],
            ["parent_id" => 7,"name" => "Midstream "],
            ["parent_id" => 7,"name" => "Downstream"],
            ["parent_id" => 7,"name" => "Oil support services"],
            ["parent_id" => 8,"name" => "Farming"],
            ["parent_id" => 8,"name" => "Fishing"],
            ["parent_id" => 8,"name" => "Forestry"],
            ["parent_id" => 8,"name" => "Animal Husbandry"]
        ];
        \Illuminate\Support\Facades\DB::table('categories')->insert($categories);
    }
}
