<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\TaggableTaggable;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class PagesController extends Controller
{
    public function welcome()
    {
    	$posts = Post::orderBy('id', 'DESC')->get();
    	return view('welcome', compact('posts'));
    }

    public function user_profile($user) {
    	$user_id = Hashids::connection('user')->decode($user)[0];
    	$posts = Post::orderBy('id', 'DESC')->where(["user_id" => $user_id])->get();
        
    	return view('pages.user',compact('user_id', 'posts'));
    }

    public function single_post($post_id)
    {
        $id = Hashids::connection('post')->decode($post_id)[0];
        $post = Post::find($id);
        return view('pages.share_post', compact('post'));
    }

    public function tags_post($tag_id)
    {
        $posts = TaggableTaggable::where(["tag_id" => $tag_id])->get();
        return view('pages.tags_post',compact('posts'));
    }

    public function discover_people()
    {
        $users = User::inRandomOrder()->select("id")->limit(15)->get();
        return view('pages.discover_people',compact('users'));
    }
}
