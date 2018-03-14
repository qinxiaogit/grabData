<?php

use Illuminate\Database\Seeder;

class ArticleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        factory(App\Model\ArticleType::class,20)->create();
//        factory(App\User::class, 50)->create()->each(function ($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//        });
        DB::table('article_type')->insert([
            'label' => str_random(10),
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
