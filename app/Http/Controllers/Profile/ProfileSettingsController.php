<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileSettingsController extends Controller
{
    public function profile_pic(Request $request)
    {
    	if(file_exists("assets/profile_pics/".Auth::user()->profile_pic)) 
    	{
    	    unlink("assets/profile_pics/".Auth::user()->profile_pic);
    	}
    	$data = $request->profile_pic;
    	list($type, $data) = explode(';', $data);
    	list(, $data)      = explode(',', $data);
    	$data = base64_decode($data);
    	$image_name= rand().'.jpg';
    	$path =  "assets/profile_pics/" . $image_name;
    	file_put_contents($path, $data);

    	return $update_pic = User::where(["id" => Auth::id()])->update(["profile_pic" => $image_name]);
    }
}
