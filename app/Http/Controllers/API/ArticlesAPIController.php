<?php
 
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticlesAPIController extends Controller
{
    //di sini isi controller articles
    public function articles(Request $request)
    {
    	// mengambil data dari table articles
    	$articles = Articles::get();
 
    	// mengirim data articles ke view 
       // return json_encode($articles->toArray());
        return response()->json($articles)->header('Content-Type', 'application/json');;
 
    }

    
    public function simpan(Request $request )
    {
    	// mengambil data dari table articles
        $post = $request->all();

        $validator = Validator::make($post, [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            $result['error'] = "salah input";
            $result['status'] = 0;
            return response()->json($result)->header('Content-Type', 'application/json');;
        }else{
            $result['success'] = "berhasil simpan";
            $result['status'] = 1;
            return response()->json($result)->header('Content-Type', 'application/json');
        }

        // print_r($post);die;
        $save = Articles::insert([
            'category_id' => $post['category_id'],
            'title' => $post['title'],
            'title_url' => Str::slug($post['title']),
            'description' => $post['description'],
            'content' => $post['content'],
        ]);
        if($save){
            $result['succes'] = "berhasil disimpan";
            $result['status'] = 1;
            return response()->json($result)->header('Content-Type', 'application/json');
        }else{
            $result['error'] = "gagal di simpan";
            $result['status'] = 0;
            return response()->json($result)->header('Content-Type', 'application/json');
        }

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
        $update['success'] = "berhasil update";
        return response()->json($update)->header('Content-Type', 'application/json');;
 
    }

    public function detail($title_url)
    {
    
            $articles = Articles::where('title_url',$title_url)->select('title','nama as nama_categories','content','description')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->get();
        //dd($articles);die;
        $result['success'] = "detail artikel";
        return response()->json($articles)->header('Content-Type', 'application/json');;
 
    }

    public function hapus($id)
    {
        Articles::where('id',$id)->delete();
        
        $result['success'] = "berhasil hapus";
            
        return response()->json($result)->header('Content-Type', 'application/json');;
    }
}