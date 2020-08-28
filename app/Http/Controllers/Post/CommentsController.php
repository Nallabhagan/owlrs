<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Validator;
use App\Comment;
use App\User;
use App\Post;

class CommentsController extends Controller
{
    public function add_comment(Request $request)
    {
    	
    	$post_id = Hashids::connection('post')->decode($request->post_token)[0];

    	$rules = array(
    		'comment' => 'required',
    	);

    	$error = Validator::make($request->all(), $rules);

    	if($error->fails())
    	{
    	    return response()->json(['errors' => $error->errors()->all()]);
    	}
    	
    	$data = Comment::create([
    	    'user_id' => Auth::id(),
    	    'post_id' => $post_id,
    	    'comment' => $request->comment
    	]);
    	if($data)
    	{
            $post_details = Post::find($post_id);
            $details = [
                "notification_message" => "Commented on",
                "user_id" => Auth::id(),
                "post_url" => url('post').'/'.Hashids::connection('post')->encode($post_id)
            ];
            $notify_user = User::find($post_details->user_id);
            $notify_user->notify(new \App\Notifications\Comment($details));
    		return $request->comment;
    	}
    }
}
