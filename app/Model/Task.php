<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

/**
 * App\Model\Task
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Task whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    use ElasticquentTrait;
    protected $fillable = [
        'title',
        'id',
        'content'
    ];
}
