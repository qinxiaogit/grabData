<?php
/*
 * author: newugo
 * createTime:2018/3/14 13:44
 */

namespace App\Services;

use App\Repositories\BlogRepository;
use App\Model\Article;
use Illuminate\Database\Eloquent\Collection;

class BlogService extends Service
{
    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }
}