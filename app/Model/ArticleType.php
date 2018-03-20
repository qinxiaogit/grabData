<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArticleType extends Model
{
    public function hasManyArticles()
    {
        return parent::hasMany('App\Model\Atritcle', 'type_id', 'id'); // TODO: Change the autogenerated stub
    }
}