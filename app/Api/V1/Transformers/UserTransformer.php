<?php
/*
 * author: newugo
 * createTime:2018/3/26 12:51
 */

namespace App\Api\V1\Transformers;
use League\Fractal\TransformerAbstract;
use App\Model\User;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user){
        return [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ];
    }
}