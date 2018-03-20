<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        $this->call(BookTableSeeder::class);
        for ($i=0;$i<10000000;$i++)
        DB::table('books')->insert([
            'label' => str_random(10),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }

}
