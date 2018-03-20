<?php
/*
 * author: newugo
 * createTime:2018/3/14 13:40
 */
namespace App\Repositories;
use App\Model\Article;
use Illuminate\Database\Eloquent\Collection;

class BlogRepository extends Repository{

    public function index(): Collection
    {
        return Article::orderBy('created_at','desc')->get();
    }
}