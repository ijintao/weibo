<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Request;

class User extends Model
{
    /**
     * @return mixed
     * @desc 获取最新用户ID
     */
    public static function getNextUid()
    {
        Redis::incr('next_uid');
        return Redis::get('next_uid');
    }

    /**
     * @param $uid
     * @return mixed
     */
    public static function findById($uid)
    {
        return Redis::hGetAll('user:' . $uid);
    }

    /**
     * @param $username
     * @return bool
     * @desc 通过用户名查找用户详情
     */
    public static function findByUsername($username)
    {
        $uid = Redis::get('user:' . $username);
        if (false === $uid) return false;
        return self::findById($uid);
    }

    /**
     * @param $username
     * @return mixed
     * @desc 用户是否注册
     */
    public static function isRegister($username)
    {
        return Redis::hExists('user:' . $username, $username);
    }

    /**
     * @param $user
     * @desc 添加用户
     */
    public static function insert($user)
    {
        $hkey = 'user:' . $user['uid'];
        Redis::hMset($hkey, $user);
        Redis::set('user:' . $user['username'], $user['uid']); //同时存好username和uid的对应
    }

    /**
     * @param $targetUserId
     * @param $userId
     * @desc 对某人进行关注
     */
    public static function follow($targetUserId, $userId)
    {
        //自己关注的列表
        $followingKey = 'following:' . $userId;
        Redis::sadd($followingKey, $targetUserId);
        //被关注者的粉丝列表
        $followersKey = 'followers:' . $targetUserId;
        Redis::sadd($followersKey, $userId);
        $followers = Redis::sCard($followersKey); //获取粉丝数
        Redis::hset('user:' . $targetUserId, 'fans', $followers);
    }

    public static function isFollow($targetUserId,$userId)
    {
        //自己关注的列表
        $followingKey = 'following:' . $userId;
    }

    /**
     * @param $targetUserId
     * @param $userId
     * @desc 对某人取消关注
     */
    public static function unfollow($targetUserId,$userId){
        //自己关注的列表
        $followingKey='following:'.$userId;
        Redis::sRem( $followingKey, $targetUserId);
        //被关注者的粉丝列表
        $followersKey='followers:'.$targetUserId;
        Redis::sRem( $followersKey, $userId);
        $followers = Redis::sCard($followersKey); //获取粉丝数
        Redis::hset( 'user:'.$targetUserId, 'fans', $followers);
    }

}
