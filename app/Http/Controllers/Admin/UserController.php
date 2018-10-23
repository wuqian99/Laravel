<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserTest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     *查询数据
     *
     * @param Request $request
     * @return void
     */
    function get(Request $request){
        $id = $request->route('id');

        //创建UserTest模板实例
        $userTest = new UserTest();

        if(!$id){
            //通过创建的实例查询数据
            $results = $userTest->get()->toArray();
            //将数据json化，加参数解决中文json化时乱码问题
            print_r(json_encode($results, JSON_UNESCAPED_UNICODE));
            return;
        }
      
        //直接通过模板名称查询数据
        $results2 = UserTest::where('id',$id)->get()->toArray();
        print_r($results2);   
    }

    /**
     * 插入数据
     *
     * @return void
     */
    function writeUser(){
        UserTest::insert(['username' => '米卢', 'age'=>19]);
        echo '插入成功';
    }

    /**
     * 删除数据
     *
     * @return void
     */
    protected function deleteUser(Request $request){
        $id = $request -> route('id');
        $del = DB::delete('delete from user where id = '.$id);

    }

    /**
     * 更新数据
     *
     * @return void
     */
    protected function updateUser(Request $request){
        $id = $request->route('id');
        UserTest :: where('id',$id) -> update(['age'=>21]) ;
        
        // DB::update('update user set age = 30 where id = '.$id);
        // DB::table('user') -> where('id',$id) -> update(['age' => 35]);
    }


    //-----------------------Eloquent模型查询构建器---------------------------------

    protected function query(){
        //获取模型查询所有数据
        // $users = UserTest::all();
        // foreach($users as $user){
        //     echo $user ->id.'=>'. $user->username.',';
        // }

       // $data = UserTest::where('id',1) -> get()->toArray();

    //    $data = UserTest::find(2)->toArray();

    //插入数据
        // $users = new UserTest;
        // $users->username = '付芳';
        // $users->age = 18;
        // $users->save();

        //更新数据
        // $oneOfUsers = UserTest::find(4);
        // $oneOfUsers->age = 17;
        // $oneOfUsers->save();

        //批量赋值
        // $users = new UserTest();
        $u = UserTest::create(['username' => 'rose']);
        $u->fill(['name'=>'naki']);
    }


}
