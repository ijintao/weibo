<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $inputs = $request->input();
            $isRegister = User::isRegister($inputs['username']);
            if($isRegister){
                return ['status'=>'0','msg'=>'用户已经存在，注册失败！','data'=>''];
            }
            $uid = User::getNextUid();
            unset($inputs['rePassword']);
            $inputs['password']= sha1($inputs['password']);
            $inputs['uid']= $uid;
            $inputs['fans']= 0;
            $inputs['posts']= 0;
            $inputs['regtime']= time();
            User::insert($inputs);
            return ['status'=>'1','msg'=>'注册成功','data'=>$inputs];
        }else{
            return view('user.register');
        }
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $username = $request->input('username');
            $password = sha1($request->input('password'));
            $info = User::findByUsername($username);
            if($info && $info['password']==$password){
                $isLogin = $request->session()->put('isLogin',$info['uid']);
                return ['status'=>1,'msg'=>'登录成功'];
            }else{
                return ['status'=>0,'msg'=>'用户名或密码错误，登录失败！'];
            }
        }else{
            return view('user.login');
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return ['status'=>1,'msg'=>'退出成功！'];
    }

    /**
     * @param Request $request
     * @param $targetUserId
     * @return array
     */
    public function follow(Request $request,$targetUserId)
    {
        $uid = $request->session()->get('isLogin') ?? 0;
        User::follow($targetUserId,$uid);
        return ['status'=>1,'msg'=>'关注成功！'];
    }

    public function unfollow(Request $request,$targetUserId)
    {
        $uid = $request->session()->get('isLogin') ?? 0;
        User::unfollow($targetUserId,$uid);
        return ['status'=>1,'msg'=>'取消关注成功！'];
    }
}
