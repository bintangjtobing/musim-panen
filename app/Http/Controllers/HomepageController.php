<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blogdb;
use App\gallerydb;
use App\itemproduk;
use App\kategori;
use App\productsdb;
use App\video;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index()
    {
        $blog = blogdb::orderBy('created_at', 'DESC')->limit(3)->get();
        $galp = DB::table('gallerydbs')
            ->join('productsdbs', 'gallerydbs.product_id', '=', 'productsdbs.id')
            ->select('gallerydbs.*', 'productsdbs.*')
            ->limit(8)
            ->orderBy('gallerydbs.created_at', 'DESC')
            ->get();
        $product = DB::table('productsdbs')
            ->orderBy('productsdbs.product_name', 'ASC')
            ->select('productsdbs.*')
            ->get();
        $partner = DB::table('partners')
            ->orderBy('partners.id', 'ASC')
            ->select('partners.*')
            ->get();
        return view('homepage.index', ['blog' => $blog, 'galp' => $galp, 'product' => $product, 'partner' => $partner]);
    }
    public function blogview($judul)
    {
        $blog = DB::table('blogdbs')
            ->where('blogdbs.judul', '=', $judul)
            ->select('blogdbs.*')
            ->first();
        // dd($blog);
        $blogcollection = blogdb::orderBy('created_at', 'ASC')->limit(3)->get();
        $kategori = DB::table('productsdbs')
            ->orderBy('productsdbs.product_name', 'ASC')
            ->select('productsdbs.*')
            ->get();
        return view('homepage.blog', ['blog' => $blog, 'blogcollection' => $blogcollection, 'kategori' => $kategori]);
    }
    public function projectsview()
    {
        $blog = blogdb::orderBy('created_at', 'DESC')->paginate(9);
        return view('homepage.projects', ['blog' => $blog]);
    }
    public function galleryview()
    {
        return view('homepage.gallery.index');
    }
    public function videoview()
    {
        return view('homepage.videos.index');
    }
    public function blog()
    {
        return view('homepage.blog');
    }

    public function productdetails($id)
    {
        $item = DB::table('itemproduks')
            ->where('itemproduks.katalog_id', '=', $id)
            ->orderBy('itemproduks.created_at', 'DESC')
            ->select('itemproduks.*')
            ->get();
        $items = DB::table('itemproduks')
            ->join('kategoris', 'itemproduks.kategori_id', '=', 'kategoris.id')
            ->join('productsdbs', 'itemproduks.katalog_id', '=', 'productsdbs.id')
            ->select('itemproduks.*', 'kategoris.nama_kategori', 'productsdbs.product_name')
            ->get();
        $kategori = DB::table('kategoris')
            ->where('kategoris.product_id', '=', $id)
            ->orderBy('kategoris.created_at', 'DESC')
            ->select('kategoris.*')
            ->get();
        $catalog = productsdb::find($id);
        return view('homepage.catalog.details', ['catalog' => $catalog, 'item' => $item, 'kategori' => $kategori, 'items' => $items]);
        // dd($item);
    }
    public function productcatdetails($id)
    {
        $item = DB::table('itemproduks')
            ->where('itemproduks.kategori_id', '=', $id)
            ->orderBy('itemproduks.created_at', 'DESC')
            ->select('itemproduks.*')
            ->get();
        $kategori = DB::table('kategoris')
            ->where('kategoris.product_id', '=', $id)
            ->orderBy('kategoris.created_at', 'DESC')
            ->select('kategoris.*')
            ->get();
        $catalog = kategori::find($id);
        return view('homepage.catalog.catdetails', ['catalog' => $catalog, 'item' => $item, 'kategori' => $kategori]);
        // dd($item);
    }
}
