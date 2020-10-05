<?php

namespace App\Http\Controllers\ReaderClub;

use App\ClubPost;
use App\Http\Controllers\Controller;
use App\Post;
use App\ReaderClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClubListItemController extends Controller
{
    public function index($slug) 
    {
		$club_info = ReaderClub::select("*")->where(["slug" => $slug])->first();
		$club_id = $club_info['id'];
    	$posts = DB::table('posts')->join('club_posts', 'posts.id', '=', 'club_posts.post_id')->where(["club_posts.club_id" => $club_id])->paginate(10);
    	

    	return view('pages.readers_club.club', compact('club_info', 'posts'));
    }

    public function save(Request $request)
    {
    	if($request->clicked_image != null)
        {
            $rules = array(
            	'source_of_book' => 'required',
                'description' => 'required',
              	'clicked_image'  => 'required|image|max:2048'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image = $request->file('clicked_image');

            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(('assets/book_clicks'), $new_name);

        }else{
            $new_name = "NULL";
        }

        $data = Post::create([
            'user_id' => Auth::id(),
            'book_source' => $request->source_of_book,
            'description' => $request->description,
            'book_click' => $new_name,
            'status' => "PUBLISHED"
        ]);

        if($data)
        {
            $club_post = ClubPost::create([
            	'club_id' => $request->club_id,
            	'post_id' => $data->id
            ]);
            if($club_post) {
            	return response()->json([
            	    'message' => true,
            	]);
            }
            
        }
    }
}
