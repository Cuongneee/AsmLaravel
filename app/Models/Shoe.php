<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shoe extends Model
{
    use HasFactory;
    protected $table = 'shoes';

    protected $primaryKey = 'id_shoe';

    protected $fillable = [
        'title',
        'shoe_name',
        'thumbnail',
        'description',
        'price',
        'view',
        'specification',
        'brand_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id_brand'); 
    }

    public static function allShoes()
    {
        // Lấy danh mục
        return $shoes = DB::table('shoes')
            ->join('brands', 'shoes.brand_id', '=', 'brands.id_brand')
            ->select('shoes.*', 'brands.brand_name')
            ->orderByDesc('id_shoe')
            ->limit(9)
            ->paginate(9);


    }

    public static function loadBrand($id)
    {
        return $shoes = DB::table('shoes')
            ->join('brands', 'shoes.brand_id', '=', 'brands.id_brand')
            ->select('shoes.*', 'brands.brand_name')
            ->where('shoes.brand_id', $id)
            ->paginate(9);
    }

    public static function loadTopView()
    {
        return $loadView = DB::table('shoes')
            ->select('shoes.*')
            ->orderByDesc('view')
            ->limit(3)
            ->get();
    }

    public static function search($word)
    {
        return $shoes = DB::table('shoes')
            ->join('brands', 'shoes.brand_id', '=', 'brands.id_brand')
            ->select(
                'shoes.id_shoe',
                'shoes.shoe_name',
                'shoes.thumbnail',
                'shoes.description',
                'shoes.price',
                'shoes.view',
                'shoes.specification',
                'brands.brand_name'
            )
            ->where('shoe_name', 'LIKE', "%$word%")
            ->orderByDesc('id_shoe')
            ->paginate(9);

    }

    public static function getHighPriceShoes()
    {
        return DB::table('shoes')
            ->join('brands', 'shoes.brand_id', '=', 'brands.id_brand')
            ->select(
                'shoes.id_shoe',
                'shoes.shoe_name',
                'shoes.thumbnail',
                'shoes.description',
                'shoes.price',
                'shoes.view',
                'shoes.specification',
                'brands.brand_name'
            )
            ->orderBy('price', 'desc')
            ->paginate(9);
    }

    public static function getLPowPriceShoes()
    {
        return DB::table('shoes')
            ->join('brands', 'shoes.brand_id', '=', 'brands.id_brand')
            ->select(
                'shoes.id_shoe',
                'shoes.shoe_name',
                'shoes.thumbnail',
                'shoes.description',
                'shoes.price',
                'shoes.view',
                'shoes.specification',
                'brands.brand_name'
            )
            ->orderBy('price')
            ->paginate(9);
    }

}
