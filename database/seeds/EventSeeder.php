<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'name' => 'Standard Events',
                'price_per_person' => '10'
            ],
            [
                'name' => 'VIP Events',
                'price_per_person' => '20'
            ],
        ];
        foreach ($events as $event) {
            $event = Event::create([
                'name' => $event['name'],
                'price_per_person' => $event['price_per_person'],


        ]);
        }
    }
}
