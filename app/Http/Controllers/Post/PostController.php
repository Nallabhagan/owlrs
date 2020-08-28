<?php

namespace App\Http\Controllers\Post;

use App\Comment;
use App\Hoot;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;


class PostController extends Controller
{
    public function create(Request $request)
    {

    	if($request->clicked_image != null)
        {
            $rules = array(
            	'source_of_book' => 'required',
              	'clicked_image'  => 'required|image|max:2048'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return redirect()->back()->withErrors(['errors' => $error->errors()->all()]);
                // return response()->json(['errors' => $error->errors()->all()]);
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
            if($request->read_for != "")
            {
                $data->tag($request->read_for);
            }
            return response()->json([
                'message' => true,
            ]);
        }
    	
    }

    public function delete_post(Request $request)
    {
        $post_id = Hashids::connection('post')->decode($request->post_token)[0];
        $click_image = Post::select('book_click')->where(["id" => $post_id])->first()['book_click'];
        if(file_exists("assets/book_clicks/".$click_image)) 
        {
            unlink("assets/book_clicks/".$click_image);
        }

        $delete_comment = Comment::where(["post_id" => $post_id])->delete();
        $delete_hoot = Hoot::where(["post_id" => $post_id])->delete();
        return $delete_post = Post::where(["id" => $post_id])->delete();
    }
}
