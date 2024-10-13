<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index()
    {
        $admin = User::where('role', 'admin')->first();

        $brands = Brand::paginate(10);

        // dd($brands);

        return view('admin.brands.index', compact('brands', 'admin'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        // dd(vars: $request->all());

        $data = $request->validate([
            'brand_name' => ['required', 'max:20'],
            'is_active' => ['nullable', Rule::in([0, 1])],
        ]);

        try {
            Brand::query()->create($data);

            return redirect()
                ->route('brand.index')
                ->with('success', true);

        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function show(Brand $brand)
    {
        // dd($brand);
        return view('admin.brands.show', compact('brand'));

    }

    public function edit(Brand $brand)
    {
        // dd($brand);
        return view('admin.brands.edit', compact('brand'));

    }

    public function update(Brand $brand, Request $request)
    {
        // dd($request);

        $data = $request->validate([
            'brand_name' => 'max:20',
            'is_active' => ['nullable', Rule::in([0, 1])],
        ]);

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        try {
            $brand->update($data);

            return back()->with('success', true);

        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function hide(Brand $brand)
    {
        try {

            $brand->update(['is_active' => 0]);

            return back()->with('success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function restore(Brand $brand)
    {
        try {

            $brand->update(['is_active' => 1]);

            return back()->with('success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


}
