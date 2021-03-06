<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\admindb;
use App\announce;
use App\blogdb;
use App\Contact;
use App\email;
use App\gallerydb;
use App\itemproduk;
use App\kategori;
use App\Mail\SendMessage;
use App\partner;
use App\productsdb;
use App\video;
use App\itemgalleri;

class DashboardController extends Controller
{
    public function loginshow()
    {
        return view('auth.login');
    }
    public function loginproses(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $check = DB::table('admindbs')
            ->where('username', $username)
            ->first();

        if ($check && HASH::check($password, $check->password) && $check->status == 'active') {
            $check->isLogin = 'login';
            $check = (array)$check;
            session($check);

            return redirect('/admin/dashboard');
        }
        return back()->with('gagal', 'Coba periksa kembali otoritas keanggotaanmu atau pertanyakan kepada kepala admin.');
        // dd($request->all());
    }

    // Content GET of Dashboard
    public function index()
    {
        $ann = DB::table('announces')
            ->where('status', '=', 'Active')
            ->first();
        $quotation = DB::table('quotations')->count();
        $catalog = DB::table('productsdbs')->count();
        $kategori = DB::table('kategoris')->count();
        $item = DB::table('itemproduks')->count();
        return view('dashboard.index', ['ann' => $ann, 'quotation' => $quotation, 'catalog' => $catalog, 'kategori' => $kategori, 'item' => $item]);
    }
    // User Section
    public function showuser()
    {
        $getuser = DB::table('admindbs')
            ->where('admindbs.role', '!=', 'Developer')
            ->orderBy('admindbs.name', 'ASC')
            ->select('admindbs.*')
            ->get();
        return view('dashboard.user.show', ['getuser' => $getuser]);
    }
    public function prosesaaddnew(Request $request)
    {
        $user = new admindb();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = HASH::make($request->password);
        $user->unpassword = $request->verpassword;
        $user->role = $request->role;
        $user->status = 'active';
        $user->birthdate = '-';
        $user->save();

        return back()->with('selamat', 'Data user berhasil kamu tambahkan. Dan sudah bisa digunakan.');
    }
    public function trashuser($id, Request $request)
    {
        $user = admindb::find($id);
        // dd($user);
        if ($user) {
            if ($user->delete()) {
                DB::statement('ALTER TABLE admindbs AUTO_INCREMENT = ' . (count(admindb::all()) + 1) . ';');

                return back()->with('selamat', 'Data user berhasil dihapus.');
            }
        }
    }
    public function updateuser($id, Request $request)
    {
        $user = admindb::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = HASH::make($request->password);
        $user->unpassword = $request->verpassword;
        $user->role = $request->role;
        $user->save();

        return back()->with('selamat', 'Data user berhasil diupdate');
    }
    // End User section

    // BLOG SECTION
    public function showblog()
    {
        $product = DB::table('productsdbs')
            ->orderBy('productsdbs.product_name', 'ASC')
            ->select('productsdbs.*')
            ->get();
        $blog = DB::table('blogdbs')
            ->orderby('blogdbs.created_at', 'DESC')
            ->select('blogdbs.*')
            ->get();
        return view('dashboard.blog.show', ['product' => $product, 'blog' => $blog]);
    }
    public function prosesaddblog(Request $request)
    {
        $blog = new blogdb();
        $blog->judul = $request->judul;
        $blog->kategori_produk = $request->kategori_produk;
        $blog->isi = $request->isi;
        if (!$request->hasFile('coverimg')) {
            $blog->save();
        } else {
            $lamp = $request->file('coverimg');
            $filename = time() . '.' . $lamp->getClientOriginalExtension();
            $request->file('coverimg')->move('media/blog/', $filename);
            $blog->coverimg = $filename;
            $blog->save();
        }
        return back()->with('selamat', 'Projek blog kamu sudah berhasil kamu tambahkan');
    }
    public function trashblog($id, Request $request)
    {
        $blog = blogdb::find($id);
        // dd($user);
        if ($blog) {
            if ($blog->delete()) {
                DB::statement('ALTER TABLE blogdbs AUTO_INCREMENT = ' . (count(blogdb::all()) + 1) . ';');

                return back()->with('selamat', 'Data Blog berhasil dihapus.');
            }
        }
    }
    public function updateblog($id, Request $request)
    {
        $blog = blogdb::find($id);
        $blog->judul = $request->judul;
        $blog->isi = $request->isi;
        $blog->save();

        return back()->with('selamat', 'Berhasil update data blog');
    }
    // END BLOG SECTION

    // VIDEOS SECTION
    public function showvideo()
    {
        $gal = DB::table('videos')
            ->orderBy('videos.created_at', 'DESC')
            ->select('videos.*')
            ->get();
        return view('dashboard.video.show', ['gal' => $gal]);
    }
    public function prosesaddvideo(Request $request)
    {
        $vid = new video();
        $vid->link_title = $request->link_title;
        $vid->link = 'https://youtube.com/embed/' . $request->link;
        $vid->save();

        return back()->with('selamat', 'Berhasil tambah video baru.');
    }
    public function trashvideo($id)
    {
        $gal = video::find($id);
        // dd($user);
        if ($gal) {
            if ($gal->delete()) {
                DB::statement('ALTER TABLE videos AUTO_INCREMENT = ' . (count(video::all()) + 1) . ';');

                return back()->with('selamat', 'Data video ini berhasil dihapus.');
            }
        }
    }
    // GALLERY SECTION
    public function showgallery()
    {
        $product = DB::table('productsdbs')
            ->orderBy('productsdbs.product_name', 'ASC')
            ->select('productsdbs.*')
            ->get();
        $gal = DB::table('gallerydbs')
            ->orderBy('gallerydbs.created_at', 'DESC')
            ->select('gallerydbs.*')
            ->get();
        $galp = DB::table('gallerydbs')
            ->select('gallerydbs.*')
            ->orderBy('gallerydbs.created_at', 'DESC')
            ->get();
        return view('dashboard.gallery.show', ['product' => $product, 'gal' => $gal, 'galp' => $galp]);
        // dd($galp);
    }
    public function prosesaddgallery(Request $request)
    {
        $gal = new gallerydb();
        $gal->judul_foto = $request->judul_foto;
        $gal->product_id = '-';
        if (!$request->hasFile('img')) {
            $gal->save();
        } else {
            $lamp = $request->file('img');
            $filename = time() . '.' . $lamp->getClientOriginalExtension();
            $request->file('img')->move('media/gallery/', $filename);
            $gal->img = $filename;
            $gal->save();
        }
        return back()->with('selamat', 'Foto kamu berhasil ditambahkan didalam galeri!');
    }
    public function trashgallery($id)
    {
        $gal = gallerydb::find($id);
        // dd($user);
        if ($gal) {
            if ($gal->delete()) {
                DB::statement('ALTER TABLE gallerydbs AUTO_INCREMENT = ' . (count(gallerydb::all()) + 1) . ';');

                return back()->with('selamat', 'Data foto dalam galeri ini berhasil dihapus.');
            }
        }
    }
    // PRODUCTS SECTION
    public function showproducts()
    {
        $products = DB::table('productsdbs')
            ->orderBy('productsdbs.product_name', 'ASC')
            ->select('productsdbs.*')
            ->get();
        $productget = DB::table('productsdbs')
            ->orderBy('productsdbs.product_name', 'ASC')
            ->select('productsdbs.*')
            ->get();
        $kategori = DB::table('kategoris')
            ->join('productsdbs', 'kategoris.product_id', '=', 'productsdbs.id')
            ->orderBy('kategoris.nama_kategori', 'ASC')
            ->select('kategoris.*', 'productsdbs.*', 'kategoris.description as descriptionKat', 'kategoris.id as kategoriId')
            ->get();
        $produk = DB::table('itemproduks')
            ->orderBy('itemproduks.nama_item', 'ASC')
            ->select('itemproduks.*')
            ->get();
        $itemproduk = DB::table('itemproduks')
            ->join('kategoris', 'itemproduks.kategori_id', '=', 'kategoris.id')
            // ->join('itemgalleris', 'itemproduks.id', '=', 'itemgalleris.itemid')
            ->orderBy('itemproduks.nama_item', 'ASC')
            ->select('kategoris.*', 'itemproduks.*', 'kategoris.description as descriptionItem', 'itemproduks.id as itemId')
            ->get();
        $itemproduks = [];
        foreach ($itemproduk as $item) {
            $img = DB::table('itemgalleris')
                ->where('itemgalleris.itemid', '=', $item->id)
                ->inRandomOrder()
                ->first();
            if ($img) $item->fileimg = $img->fileimg;
            $itemproduks[] = $item;
        }
        $kategoriItem = kategori::all();
        $katalogItem = productsdb::all();

        return view('dashboard.products.show', ['products' => $products, 'kategori' => $kategori, 'produk' => $produk, 'productget' => $productget, 'itemproduk' => $itemproduk, 'kategoriItem' => $kategoriItem, 'katalogItem' => $katalogItem]);
    }
    // // // Kategori Section
    public function prosesaddkategori(Request $request)
    {
        $kategori = new kategori();
        $kategori->product_id = $request->product_id;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->description = $request->description;
        // dd($request->all());
        $kategori->save();
        return redirect('/admin/products')->with('selamat', 'Data kategori produk berhasil diupdate');
    }
    // End Section
    // // // // // // // // // // // // // //

    // // // Item Section
    public function prosesadditem(Request $request)
    {
        $item = new itemproduk();
        $item->kategori_id = $request->kategori_id;
        $item->katalog_id = $request->katalog_id;
        $item->nama_item = $request->nama_produk;
        $item->description = $request->description;

        if (!$request->hasFile('fileimg')) {
            $item->save();
        } else {
            $lamp = $request->file('fileimg');
            $filename = time() . '.' . $lamp->getClientOriginalExtension();
            $request->file('fileimg')->move('media/product/item/', $filename);
            $item->fileimg = $filename;
            $item->save();
        }
        // dd($request->all());
        return redirect('/admin/products')->with('selamat', 'Data item produk berhasil ditambahkan');
    }

    // ADD ITEM V2
    public function additem()
    {
        $kategoriItem = kategori::all();
        $katalogItem = productsdb::all();
        return view('dashboard.products.index', ['kategoriItem' => $kategoriItem, 'katalogItem' => $katalogItem]);
    }
    public function prosesitem(Request $request)
    {
        $item = new itemproduk();
        $item->kategori_id = $request->kategori_id;
        $item->katalog_id = $request->katalog_id;
        $item->nama_item = $request->nama_produk;
        $item->description = $request->description;
        $item->save();

        $itemId = $item->id;
        if ($request->hasFile('fileimg')) {
            foreach ($request->file('fileimg') as $image) {
                $name = $image->getClientOriginalName();
                $image->move('media/product/item/', $name);
                // $data[] = $name;

                $itemgal = new itemgalleri();
                $itemgal->itemid = $itemId;
                $itemgal->fileimg = $name;
                $itemgal->save();
            }
        }

        return redirect('/admin/products')->with('selamat', 'Data item produk berhasil ditambahkan');
    }
    // End Item Section
    public function prosesaddproduct(Request $request)
    {
        $product = new productsdb();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->save();

        return back()->with('selamat', 'Berhasil menambahkan data produk baru anda.');
    }
    public function trashproduct($id)
    {
        $product = productsdb::find($id);
        // dd($user);
        if ($product) {
            if ($product->delete()) {
                DB::statement('ALTER TABLE productsdbs AUTO_INCREMENT = ' . (count(productsdb::all()) + 1) . ';');

                return back()->with('selamat', 'Data Produk berhasil dihapus.');
            }
        }
    }
    public function itemtrashproduct($id)
    {
        $product = itemproduk::find($id);
        // dd($user);
        if ($product) {
            if ($product->delete()) {
                DB::statement('ALTER TABLE itemproduks AUTO_INCREMENT = ' . (count(itemproduk::all()) + 1) . ';');

                return back()->with('selamat', 'Data Item Produk berhasil dihapus.');
            }
        }
    }
    public function kategoritrash($id)
    {
        $product = kategori::find($id);
        // dd($user);
        if ($product) {
            if ($product->delete()) {
                DB::statement('ALTER TABLE kategoris AUTO_INCREMENT = ' . (count(kategori::all()) + 1) . ';');

                return back()->with('selamat', 'Data Kategori Produk berhasil dihapus.');
            }
        }
    }
    public function updateproduct($id, Request $request)
    {
        $product = productsdb::find($id);
        $product->update($request->all());
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->save();

        return back()->with('selamat', 'Data produk anda berhasil diupdate.');
        // dd($product);
    }
    public function updateitemproduct($itemId, Request $request)
    {

        $item = itemproduk::find($itemId);
        $item->nama_item = $request->nama_item;
        $item->description = $request->description;
        // dd($item);
        $item->save();
        return back()->with('selamat', 'Data item produk anda berhasil di update');
    }
    public function kategoriproses($kategoriId, Request $request)
    {
        $kategori = kategori::find($kategoriId);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->description = $request->description;
        $kategori->save();
        return back()->with('selamat', 'Kategori item produk anda berhasil di update');
    }
    // PRODUCT END SECTION

    // EMAILS SECTION
    public function showemails()
    {
        $email = DB::table('emails')
            ->orderBy('emails.created_at', 'DESC')
            ->select('emails.*')
            ->get();
        return view('dashboard.emails.show', ['email' => $email]);
    }

    // Email kirim
    public function kirimpesan(Request $request)
    {
        // dd($request->all());
        $name = $request->name;
        $email = new email();
        $email->name = $request->name;
        $email->email = $request->email;
        $email->nohp = $request->nohp;
        $email->message = $request->message;
        $email->type = 'Pesan';
        $email->status = '0';
        // dd($email);
        $email->save();
        \Mail::to('info@putrakaryalogamsukses.com')->send(new SendMessage($email));
        // return back()->with('great', 'Halo ' . $name . ', kami telah menerima pesan kamu. Biasanya kami membalas dalam waktu 3x24 jam, dan kami akan segera membalas ke email anda maupun melalui nomor telepon yang sudah kamu input. Terima kasih ya.');
        return view('receivedemails', ['name' => $name]);
    }
    public function changestatus($id, Request $request)
    {
        $email = email::find($id);
        $email->status = 'read';
        $email->save();
        return back()->with('selamat', 'Email tersebut sudah berhasil diubah ke status sudah dibaca.');
    }

    // Announcement Section
    public function showannounce()
    {
        $ann = announce::all();
        return view('dashboard.announce.show', ['ann' => $ann]);
    }
    public function addnewannouncement(Request $request)
    {
        $ann = new announce();
        $ann->title = $request->title;
        $ann->messages = $request->messages;
        $ann->status = 'Active';
        $ann->save();

        return back()->with('selamat', 'Berhasil menambah pengumuman');
    }
    public function editannounce($id, Request $request)
    {
        $ann = announce::find($id);
        $ann->title = $request->title;
        $ann->messages = $request->messages;
        $ann->status = $request->status;
        $ann->save();
        return back()->with('selamat', 'Pengumuman berhasil diupdate');
    }
    // END

    // Partner Section
    public function showpartner()
    {
        $partner = partner::orderBy('created_at', 'DESC')->get();
        return view('dashboard.partner.show', ['partner' => $partner]);
    }
    public function prosesaddpartner(Request $request)
    {
        $partner = new partner();
        $partner->title = $request->title;
        if (!$request->hasFile('image')) {
            $partner->save();
        } else {
            $lamp = $request->file('image');
            $filename = time() . '.' . $lamp->getClientOriginalExtension();
            $request->file('image')->move('media/partner/', $filename);
            $partner->image = $filename;
            $partner->save();
        }
        return back()->with('selamat', 'Partner kamu berhasil ditambahkan!');
    }
    public function trashpartner($id)
    {
        $partner = partner::find($id);
        // dd($user);
        if ($partner) {
            if ($partner->delete()) {
                DB::statement('ALTER TABLE partners AUTO_INCREMENT = ' . (count(partner::all()) + 1) . ';');

                return back()->with('selamat', 'Data Partner dalam sistem ini berhasil dihapus.');
            }
        }
    }
    // End Section

    // COntct Section
    public function showcontact()
    {
        $info = DB::table('contacts')
            ->where('contacts.id', '=', '609012')
            ->select('contacts.*')
            ->first();
        return view('dashboard.contact.show', ['info' => $info]);
        // dd($info);
    }
    public function updateprofile(Request $request)
    {
        $prof = Contact::find('609012');
        $prof->whatsapp1 = $request->whatsapp1;
        $prof->whatsapp2 = $request->whatsapp2;
        $prof->facebook = $request->facebook;
        $prof->instagram = $request->instagram;
        $prof->address = $request->address;
        $prof->save();
        // dd($prof);
        // dd($request->all());
        return redirect('/admin/contact')->with('selamat', 'Profil anda berhasil di update');
    }
}
