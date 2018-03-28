<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Weibo;
class WeiboController extends Controller
{
    public function index(Request $request)
    {
        $uid = $request->session()->get('isLogin') ?? 0;
        $userInfo = [];
        $uid && $userInfo =User::findById($uid);
        $list = Weibo::getTimeLine($uid);
        return view('weibo.index',['isLogin'=>$uid,'userInfo'=>$userInfo,'list'=>$list]);
    }

    public function create(Request $request)
    {
        $uid = $request->session()->get('isLogin') ?? 0;
        if( 0 == $uid )
        {
            return ['status'=>'0','msg'=>'请先登录'];
        }
        if($request->isMethod('post'))
        {
            $contents = $request->input('contents');
            Weibo::create($uid,$contents);
            return ['status'=>1,'msg'=>'添加成功！'];
        }
    }

    public function remove(Request $request,$id)
    {

    }
}
