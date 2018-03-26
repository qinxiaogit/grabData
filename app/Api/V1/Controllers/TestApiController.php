<?php
/*
 * author: newugo
 * createTime:2018/3/26 11:20
 */
namespace App\Api\V1\Controllers;
use  App\Model\User;
use  App\Api\V1\Transformers\UserTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class TestApiController
 * @package App\Api\V1\Controllers
 * @Resource User
 */
class TestApiController extends BaseController {

    public function __construct()
    {
//        $this->middleware('api.auth');
    }
    public function logIn($id){
        $user = User::findOrFail($id);

       return  JWTAuth()->user();
    }
    public function show($id){
//        $user =  User::findOrFail($id);

//        $users = User::all();
//        return $this->response->array($user); // 响应一个数组
//        return $this->response->item($users, new UserTransformer); //响应一个元素
//        return $this->response->collection($users, new UserTransformer);//响应一个集合
//        $users = User::paginate(1);
//
//        return $this->response->paginator($users, new UserTransformer);
//        return $this->response->noContent();
//        return $this->response->error('This is an error.', 404);
//        return $this->response->errorForbidden();
        dd($this->api);
        $users = $this->api->get('users');

        return $users;

        $user = $this->auth->user();
//        if (! app('Dingo\Api\Auth\Auth')->user()) {
//            $hidden = $user->getHidden();
//
//            $user->setHidden(array_merge($hidden, ['email']));
//        }
        return $user;
    }
}