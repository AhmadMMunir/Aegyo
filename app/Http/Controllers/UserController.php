<?php
namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function user(Request $request)
    {
       
    	$articles = Articles::get();
        $categories = Categories::get();
        
    	// mengirim data articles ke view 
    	return view('user',['articles' => $articles],['categories' => $categories]);
    }
}