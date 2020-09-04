<?php
namespace App\Helpers;

use App\Follower;
use App\Hoot;
use App\Post;
use App\User;
use App\Comment;
use App\TaggableTag;
use App\TaggableTaggable;
class Helper
{
	public static function username($id) {
		$user = User::select('name')->where(["id" => $id])->first();
		return $user->name;
	}

	public static function profilepic($id) {
		
		$user = User::select('profile_pic')->where(["id" => $id])->first();

		if(filter_var($user->profile_pic, FILTER_VALIDATE_URL))
		{
		    return $user->profile_pic;
		}
		else
		{
			return url('assets/profile_pics')."/".$user->profile_pic;
		}
	}

	public static function hoot_check($userid,$postid)
	{
		$row = Hoot::where(['user_id'=>$userid,'post_id'=>$postid])->first();
		if($row != null)
		{
			return true;
		}
	}

	public static function follow_check($userid,$following_id)
	{
		$row = Follower::where(['user_id'=>$userid,'following_id'=>$following_id])->first();
		if($row != null)
		{
			return true;
		}
	}

	public static function follow_count($id)
	{
		$follower_count = Follower::select('user_id')->where(['following_id' => $id])->count();
		return $follower_count;
	}

	public static function clicks_count($id)
	{
		$follower_count = Post::select('user_id')->where(['user_id' => $id])->count();
		return $follower_count;
	}

	public static function comment_count($id)
	{
		$comment_count = Comment::select('user_id')->where(['post_id' => $id])->count();
		return $comment_count;
	}

	public static function hoot_count($id)
	{
		$comment_count = Hoot::select('user_id')->where(['post_id' => $id])->count();
		return $comment_count;
	}
	public static function post_tag_id($id)
	{
		$tag = TaggableTaggable::select('tag_id')->where([["taggable_id","=",$id],["taggable_type","=","App\Post"]])->first();
		return $tag;
	}


	public static function tag_name($id)
	{
		$tag_name = TaggableTag::select('name')->where(['tag_id' => $id])->first();
		return $tag_name->name;
	}
}
?>