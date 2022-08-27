<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Produk;

class AdminController extends Controller
{
    public function view_category(){

        $data =kategori::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $data = new kategori;

        $data->nama_kategori = $request->nama_kategori;

        $data->save();

        return redirect()->back()->with('success', 'Kategori Berhasil ditambahkan!');
    }

    public function delete_category($id){
        $data = kategori::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Kategori Berhasil dihapus!');
    }

    public function view_product(){
        $kategori = kategori::all();
        return view('admin.product', compact('kategori'));
    }

    public function add_product(Request $request){
        $data = new produk;

        $data->nama = $request->nama_product;
        $data->deskripsi = $request->deskripsi;
        $data->qty = $request->qty;
        $data->harga = $request->harga;
        $data->kategori = $request->kategori;
        
        $image = $request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $data->image=$imagename;

        $data->save();

        return redirect()->back()->with('success','Produk berhasil ditambahkan!');

    }
}
