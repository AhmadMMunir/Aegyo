<?php
 
namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    //di sini isi controller articles
    public function articles(Request $request)
    {
    	// mengambil data dari table articles
    	$articles = Articles::select('articles.id','category_id','nama as categories_nama','title','title_url','description','content')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->get();
        
        //dd($articles);die;
    	// mengirim data articles ke view 
    	return view('page.articles',['articles' => $articles],);
 
    }

    
    public function tambah(Request $request)
    {
        $categories = Categories::get();
        // echo "<pre>";
        // print_r($categories);die;
        $data = array(
            'categories' => $categories
        );
        // memanggil view tambah
        return view('page.articlestambah',$data);
 
    }

    public function simpan(Request $request)
    {
        $post = $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/articles/tambah')
                        ->withErrors($validator)
                        ->withInput();
        }

        // print_r($post);die;
	// insert data ke table articles
        $save = Articles::insert([
            'id' => $post['id'],
            'category_id' => $post['category_id'],
            'title' => $post['title'],
            'title_url' => Str::slug($post['title']),
            'description' => $post['description'],
            'content' => $post['content'],
        ]);
        if($save){
            // alihkan halaman ke halaman articles
            return redirect('/articles');
        }else{
            return redirect('/articles/tambah')
            ->withErrors(['error'=>'gagal save'])
            ->withInput();
        }
 
    }

    
    public function ubah($id)
    {
        $articles = Articles::where('id',$id)->get();
        $categories = Categories::get();
        // echo "<pre>";
        // print_r($categories);die;
        $data = array(
            'categories' => $categories
        );
        return view('page.articlesubah',['articles' => $articles],$data);
        
    }
    
    public function update(Request $request)
    {
        DB::table('articles')->where('id',$request->id)->update([
            'id' => $request->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'title_url' => Str::slug($request['title']),
        ]);
        return redirect('/articles');
    }

    public function hapus($id)
    {
     
        Articles::where('id',$id)->delete();
            
        return redirect('/articles');
    }

}