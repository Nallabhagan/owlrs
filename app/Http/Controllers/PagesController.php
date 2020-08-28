<?php

namespace App\Http\Controllers;

use App\Post;
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
}