<?php

namespace App\Http\Controllers\ReaderClub;

use App\Http\Controllers\Controller;
use App\ReaderClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = ReaderClub::all();
    	return view('pages.readers_club.club_list', compact('clubs'));
    }

    public function create()
    {
        if(Auth::id() == 1) {
            return view('pages.readers_club.create');
        } else {
            return redirect("/");
        }
    }

    public function save(Request $request)
    {
    		try {

                if($request->club_cover_pic != null)
                {
                    $rules = array(
                        'club_name' => 'required',
                        'club_cover_pic'  => 'required|image|max:2048'
                    );

                    $error = Validator::make($request->all(), $rules);

                    if($error->fails())
                    {
                        return redirect()->back()->withErrors(['errors' => $error->errors()->all()]);
                    }

                    $image = $request->file('club_cover_pic');

                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(('assets/clubs'), $new_name);
                }else{
                    $new_name = "NULL";
                    return redirect()->back()->withErrors(['errors' => ["All fields are required"]]);
                }

                $slug = Str::slug($request->club_name);
                $data = ReaderClub::create([
                    'name' => $request->club_name,
                    'image' => $new_name,
                    'slug' => $slug
                ]);

                if($data) {
                    $url = url('reader_club').'/'.$slug;
                    return redirect($url);
                }
    	        
    	    } catch(\Illuminate\Database\QueryException $e){
    	        $errorCode = $e->errorInfo[1];
    	        if($errorCode == '1062'){
                    return redirect()->back()->withErrors(['errors' => ["Club Name Already Taken"]]);
    	            
    	        }
    	    }
    }
}
