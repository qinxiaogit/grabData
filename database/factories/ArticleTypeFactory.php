<?php
/*
 * author: newugo
 * createTime:2018/3/14 14:50
 */
use Faker\Generator as Faker;

$factory->defind(App\Model\ArticleType::class,function (Faker\Generator $faker){
    return [
        'label'=>$faker->title(),
        'created_at'=>time(),
    ];
});