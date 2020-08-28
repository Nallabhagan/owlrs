<?php

namespace App\Http\Controllers\Post;

use App\Hoot;
use App\User;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class HootController extends Controller
{
    public function hoot(Request $request)
    {
    	$post_id = Hashids::connection('post')->decode($request->post_token)[0];
    	switch ($request->hoot_type) {
    		case 'Hoot':
    			$data = Hoot::create([
    			    'user_id' => Auth::id(),
    			    'post_id' => $post_id,
    			]);
                if($data) {
                    $post_details = Post::find($post_id);
                    $details = [
                        "notification_message" => "Hooted",
                        "user_id" => Auth::id(),
                        "post_url" => url('post').'/'.Hashids::connection('post')->encode($post_id)
                    ];
                    $notify_user = User::find($post_details->user_id);
                    $notify_user->notify(new \App\Notifications\Hoot($details));
                }
    			break;

    		case 'UnHoot':
    			$data = Hoot::where(['user_id' => Auth::id(),'post_id' => $post_id])->delete();
    			break;
    		
    		
    	}
    }
}
