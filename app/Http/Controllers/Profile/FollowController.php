<?php

namespace App\Http\Controllers\Profile;

use App\Follower;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
    	$following_id = Hashids::connection('user')->decode($request->following_id)[0];
    	$data = Follower::create([
    	        'user_id' => Auth::id(),
    	        'following_id' => $following_id
    	    ]);
        if($data) {
            $user_details = User::find($following_id);
            $details = [
                "notification_message" => "Start following you",
                "user_id" =>Auth::id(),
                "post_url" => url('user').'/'.Hashids::connection('user')->encode(Auth::id())
            ];
            $notify_user = User::find($user_details->id);
            $notify_user->notify(new \App\Notifications\Follow($details));
        }
    }

    public function unfollow(Request $request)
    {
        
        $following_id = Hashids::connection('user')->decode($request->following_id)[0];
        $follow = Follower::where(['user_id'=>Auth::id(),'following_id'=>$following_id])->delete();
    }
}
