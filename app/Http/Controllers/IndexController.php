<?php

namespace App\Http\Controllers;  //命名空间

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  //获取请求实例

//控制器需继承Controller
class IndexController extends Controller{
    //控制器方法使用依赖注入获取路由参数
    /**
     * 控制器学习
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function index(){
        echo 'controllerTest';
    }
}