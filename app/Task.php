<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    protected $fillable = [
        'name'
    ];
}
