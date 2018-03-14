<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);

//        $this->call(article_type_table_seeder::class);
        $this->call(ArticleTypeTableSeeder::class);
//        $this->call(ArticleSeeder::class);
//        $this->call('ArticleTypeTableSeeder');
        for ($i=0 ;$i<10;$i++){
            DB::table('article')->insert([
                'type_id'=>1,
                'title' => str_random(10),
                'created_at'=>date('Y-m-d H:i:s'),
                'content'=>'test',
            ]);
        }
    }
}
