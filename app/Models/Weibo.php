<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Weibo extends Model
{
    const DAY = 86400;
    const H = 3600;
    const I = 60;
    public static function getNextPostId(){
        Redis::incr('next_post_id');
        return Redis::get('next_post_id');
    }
    public static function create($uid,$contents)
    {
        $data = [];
        $next_post_id = self::getNextPostId();
        $data['id'] = $next_post_id;
        $data['uid'] = $uid;
        $data['contents'] = $contents;
        $data['intime'] = time();
        //保存投稿数据
        $hkey = 'posts:'.$next_post_id;
        Redis::hMset($hkey,$data);
        Redis::lPush('timeline',$next_post_id);//包含全部用户微博的时间线中追加投稿id
        //所有粉丝的时间线中追加投稿id,包括自己
        $followers = Redis::sMembers("followers:$uid");
        $followers[]= $uid; //加上自己
        foreach ($followers as $follower_uid) {
            Redis::lPush("timeline:$follower_uid", $next_post_id );
        }
        Redis::lPush("$uid:posts", $next_post_id );//往自己的微博数据中追加投稿id
        Redis::hIncrBy( "user:$uid", 'posts', 1); //增加发微博的条数
    }

    //获取首页的时间线微博数据
    public static function getTimeLine($uid=0){
        $postList=array();
        if(0==$uid){
            $post_ids=Redis::lRange('timeline',0,-1);
        }else{
            $post_ids=Redis::lRange("timeline:$uid",0,-1);
            empty($post_ids) && $post_ids=Redis::lRange('timeline',0,-1);//如果关注为空，显示全部微博数据
        }
        //获取微博的内容
        foreach ($post_ids as $post_id) {
            $postList[]=self::convert($post_id);
        }
        return $postList;
    }



    //用户自己的微博数据
    public static function getUserPosts($uid){
        $postList=array();
        $post_ids=Redis::lRange("$uid:posts",0,-1);
        //获取微博的内容
        foreach ($post_ids as $post_id) {
            $postList[]=self::convert($post_id);
        }
        return $postList;
    }


    //对于单条微博数据的获取
    public static function convert($posts_id){
        $data = Redis::hGetAll('posts:'.$posts_id);
        $data['username'] = User::findById($data['uid'])['username'];
        $data['intime'] = self::setTime($data['intime']);
        return $data;
    }

    public static function setTime($time)
    {
        $nowTime = time();
        $m = $nowTime - $time;
        if($m/self::DAY > 30){
            $str = floor($m/self::DAY/30);
            $str.='个月前';
        }elseif($m>self::DAY){
            $str = floor($m/self::DAY);
            $str.='天前';
        }elseif($m>self::H){
            $str = floor($m/self::H);
            $str.='小时前';
        }elseif($m>self::I){
            $str = floor($m/self::I);
            $str.='分钟前';
        }else{
            $str = '刚刚';
        }
        return $str;
    }

}
