<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Item::create([
            'name'=>'Test Item',
            'type'=>'found',
            'type'=>'found',
            'price'=>'50',
        ]);
    }
}
