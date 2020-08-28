<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserFavouritesController extends Controller
{
    public function update_author(Request $request)
    {
    	
        
        $rules = array(
            'author'  => 'required|array'
        );

        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return redirect()->back()->withErrors(['errors' => $error->errors()->all()]);
        }

    	$update_author = User::where(['id' => Auth::id()])->update(['author_read_most' => $request->author]);
    	if($update_author)
    	{
    		return redirect()->back();
    	}
    }
    public function update_book(Request $request)
    {

        $rules = array(
            'book'  => 'required|array'
        );

        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return redirect()->back()->withErrors(['errors' => $error->errors()->all()]);
        }

        $update_author = User::where(['id' => Auth::id()])->update(['favourite_book' => $request->book]);
        if($update_author)
        {
            return redirect()->back();
        }
    }
    public function update_quote(Request $request)
    {

        $rules = array(
            'quote'  => 'required|array'
        );

        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return redirect()->back()->withErrors(['errors' => $error->errors()->all()]);
        }

        $update_author = User::where(['id' => Auth::id()])->update(['favourite_quotes' => $request->quote]);
        if($update_author)
        {
            return redirect()->back();
        }
    }
}
