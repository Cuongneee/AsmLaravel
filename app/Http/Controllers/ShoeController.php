<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoeController extends Controller
{
    //
    public function index()
    {

        $brands = Brand::all();
        $shoes = Shoe::allShoes();

        // dd($shoes);
        // dd($brands);
        return view('client.shop', compact('brands', 'shoes'));
    }

    // Chi tiết
    public function show($id)
    {
        $brands = DB::table('brands')->get();

        $shoes = DB::table('shoes')
            ->join('brands', 'shoes.brand_id', '=', 'brands.id_brand')
            ->select('shoes.*', 'brand_name')
            ->where('id_shoe', $id)
            ->where('is_active', 1)
            ->first();
        // dd($shoes);

        // Lấy brand_id hiện tại
        $brandId = $shoes->brand_id;
        $comments = Comment::where('shoe_id', $id)
        ->where('active', 1)
        ->with('user')
        ->get(); 

        // Hiển thị theo brand
        $sameBrand = DB::table('shoes')
            ->join('brands', 'shoes.brand_id', '=', 'brands.id_brand')
            ->select('shoes.*', 'brand_name')
            ->where('shoes.brand_id', $brandId)
            ->where('shoes.id_shoe', '!=', $brandId)
            ->get();

        // Tăng view
        $view = DB::table('shoes')
            ->where('id_shoe', $id)
            ->increment('view');

        // dd($sameBrand);

        return view('client.shop-single', compact('brands', 'shoes', 'sameBrand', 'comments'));
    }

    public function listBrand($id)
    {
        $shoes = Shoe::loadBrand($id);
        $brands = Brand::all();

        return view('client.shop', compact('shoes', 'brands'));

    }

    public function topView()
    {
        $loadView = Shoe::loadTopView();
        // dd($loadView);

        return view('client.index', compact('loadView'));
    }

    public function searchShoe()
    {
        $brands = Brand::all();

        $word = $_POST['word'] ?? '';
        // dd($word);

        $shoes = Shoe::search($word);
        // dd($shoes);

        return view('client.shop', compact('brands', 'shoes'));
    }

    public function highPrice()
    {
        $brands = Brand::all();
        $shoes = Shoe::getHighPriceShoes();

        return view('client.shop', compact('shoes', 'brands'));
    }

    public function lowPrice()
    {
        $brands = Brand::all();
        $shoes = Shoe::getLPowPriceShoes();

        return view('client.shop', compact('shoes', 'brands'));
    }
}
