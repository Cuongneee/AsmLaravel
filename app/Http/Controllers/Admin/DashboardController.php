<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Shoe;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $admin = User::where('role', 'admin')->first();


        $brands = Brand::withCount('shoes')->get();


        $labels = $brands->pluck('brand_name')->toArray();
        $data = $brands->pluck('shoes_count')->toArray();

        // Lấy số lượt xem cho từng giày
        $shoes = Shoe::select('shoe_name', DB::raw('SUM(view) as total_views'))
            ->groupBy('shoe_name')
            ->orderBy('total_views', 'desc')
            ->limit(10)
            ->get();

        // Tạo mảng dữ liệu cho biểu đồ
        $shoesView = $shoes->pluck('shoe_name');
        $views = $shoes->pluck('total_views');


        return view('admin.index', compact('admin', 'labels', 'data', 'shoesView', 'views'));
    }





}