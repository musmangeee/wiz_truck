<?php

use App\Package;
use Illuminate\Database\Seeder;


class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'Package A (20 - 49 guests)',
                'event_id' => '1',
                'booking_fee'=>'39.99'
            ],
            [
                'name' => 'Package B (50 - 99 guests)',
                'event_id' => '1',
                'booking_fee'=>'59.99'
            ],
            [
                'name' => 'Package C (over 100 guests)',
                'event_id' => '1',
                'booking_fee'=>' 79.99'
            ],
            [
                'name' => 'Package A (20 - 49 guests)',
                'event_id' => '2',
                'booking_fee'=>'99.99'
            ],
            [
                'name' => 'Package A (20 - 49 guests)',
                'event_id' => '2',
                'booking_fee'=>'149.99'
            ],
            [
                'name' => 'Package C (over 100 guests)',
                'event_id' => '2',
                'booking_fee'=>' 199.99'
            ],

        ];
        foreach ($packages as $package) {
            $package = Package::create([
                'name' => $package['name'],
                'event_id' => $package['event_id'],
                'booking_fee'=>$package['booking_fee'],


        ]);
        }
    }
}
