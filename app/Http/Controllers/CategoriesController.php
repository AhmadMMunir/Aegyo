<?php
 
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function categories()
    {
    
    	$categories = Categories::get();
 
    	return view('page.categories',['categories' => $categories]);
 
    }

    public function tambah()
    {
 
	// memanggil view tambah
	return view('page.categoriestambah');
 
    }

    public function simpan(Request $request)
    {
        $post = $request->all();

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama' => 'required',
            
        ]);

        if ($validator->fails()) {
            return redirect('/categories/tambah')
                        ->withErrors($validator)
                        ->withInput();
        }

        // print_r($post);die;
        $save = Categories::insert([
            'id' => $post['id'],
            'nama' => $post['nama'],
            'nama_url' => Str::slug($post['nama']),
        ]);
        if($save){
            return redirect('/categories');
        }else{
            return redirect('/categories/tambah')
            ->withErrors(['error'=>'gagal save'])
            ->withInput();
        }
 
    }

    public function ubah($id)
    {
        
        $categories = Categories::where('id',$id)->get();
        return view('page.categoriesubah',['categories' => $categories]);
    }

    public function update(Request $request)
    {
        // update data categories
        DB::table('categories')->where('id',$request->id)->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'nama_url' => Str::slug($request['nama']),
        ]);
        // alihkan halaman categories
        return redirect('/categories');
    }


    public function hapus($id)
    {
        // menghapus data categories berdasarkan id yang dipilih
        Categories::where('id',$id)->delete();
            
        // alihkan halaman ke halaman categories
        return redirect('/categories');
    }

}