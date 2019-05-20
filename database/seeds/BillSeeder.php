<?php

use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Bill::create([
          'item_id' =>'1',
          'amount' =>'1',
          'total' =>'50',
       ]);
    }
}
