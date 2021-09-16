<?php
 
namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CategoriesAPIController extends Controller
{
    public function categories(Request $request)
    {
    	// mengambil data dari table 
    	$categories = Categories::get();
 
       // return json_encode($categories->toArray());
        return response()->json($categories)->header('Content-Type', 'application/json');;
 
    }

    public function simpan(Request $request)
    {
    	
        $post = $request->all();

        $validator = Validator::make($request->all(), [  
            'nama' => 'required',  
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
        $save = Categories::insert([
            'id' => $post['id'],
            'nama' => $post['nama'],
        ]);

        if(!$save){
            $result['error'] = "gagal disimpan";
            $result['status'] = 0;
            return response()->json($result)->header('Content-Type', 'application/json');
        }else{
            $result['success'] = "berhasil simpan";
            $result['status'] = 1;
            return response()->json($result)->header('Content-Type', 'application/json');
        }
 
    }

    public function update(Request $request)
    {
        // update data categories
        DB::table('categories')->where('id',$request->id)->update([
          
            'nama' => $request->nama,
          
        ]);
        // alihkan halaman categories
        $update['success'] = "berhasil update";
        return response()->json($update)->header('Content-Type', 'application/json');;
    }

    
    public function hapus($id)
    {
        Categories::where('id',$id)->delete();
        
        $result['success'] = "berhasil hapus";
        return response()->json($result)->header('Content-Type', 'application/json');;
    }
}