<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';

    protected $primaryKey = 'id_brand';
    protected $fillable = [
        'brand_name',
        'is_active'
    ];

    public $attributes = [
        'is_active' => 0
    ];

    public function allBrand()
    {
        return $brands = DB::table('brands')->get();
    }

    public function shoes()
{
    return $this->hasMany(Shoe::class, 'brand_id', 'id_brand'); 
}
}
