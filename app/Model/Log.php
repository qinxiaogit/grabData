<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Log extends Model
{
    use ElasticquentTrait;
    //
    protected $table = 'elk_log';

    public function getIndexName(){
        return 'elk_log_index';
    }
}
