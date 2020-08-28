<?php

namespace App\Http\Controllers;

use App\TaggableTag;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    function readfor_list(Request $request)
    {

	    if($request->get('query'))
	    {
	      	$query = $request->get('query');
	      	$data = TaggableTag::where('name', 'LIKE', "%{$query}%")->get();
	        		
	      	$output = '<ul class="has-background-white box-shadow border">';
	      	foreach($data as $row)
	      	{
	       		$output .= '
	       			<li class="search_li">'.$row->name.'</li>
	       		';
	      	}
	      	$output .= '</ul>';
	      	echo $output;
	    }
	}
}
