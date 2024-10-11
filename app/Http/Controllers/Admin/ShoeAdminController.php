<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\TryCatch;

class ShoeAdminController extends Controller
{
    public function index()
    {
        $shoes = Shoe::with('brand')->latest('id_shoe')->paginate(10);
        // dd($shoes);
        return view('admin.shoes.index', compact('shoes'));
    }

    public function show(Shoe $shoe)
    {
        return view('admin.shoes.show', compact('shoe'));

    }

    public function create()
    {
        $brands = Brand::all();
        // dd($brands);
        return view('admin.shoes.create', compact('brands'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'shoe_name' => ['required', 'max:255', Rule::unique('shoes')],
            'brand_id' => 'required|exists:brands,id_brand',
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'description' => ['required', 'max:255'],
            'price' => ['required'],
            'specification' => ['required', 'max:255']
        ]);

        try {

            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = Storage::put('shoes', $request->file('thumbnail'));
            }
            Shoe::query()->create($data);

            return redirect()
                ->route('shoes.index')
                ->with('success', true);

        } catch (\Throwable $th) {

            if (!empty($data['thumbnail']) && Storage::exists($data['thumbnail'])) {
                Storage::delete($data['thumbnail']);
            }

            return redirect()
                ->route('shoes.create')
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function edit(Shoe $shoe)
    {
        $brands = Brand::all();
        return view('admin.shoes.edit', compact('shoe', 'brands'));
    }

    public function update(Request $request, Shoe $shoe)
    {
        $data = $request->validate([
            'shoe_name' => ['required', 'max:255'],
            'brand_id' => 'required|exists:brands,id_brand',
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'description' => ['required', 'max:255'],
            'price' => ['required'],
            'specification' => ['required', 'max:255']
        ]);

        try {

            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = Storage::put('shoes', $request->file('thumbnail'));
            }

            $oldThumbnail = $shoe->thumbnail;

            $shoe->update($data);

            if (
                $request->hasFile('thumbnail')
                && !empty($oldThumbnail)
                && Storage::exists($oldThumbnail)
            ) {
                Storage::delete($data['thumbnail']);
            }

            return back()
                ->with('success', true);

        } catch (\Throwable $th) {

            if (!empty($data['thumbnail']) && Storage::exists($data['thumbnail'])) {
                Storage::delete($data['thumbnail']);
            }

            return redirect()
                ->route('shoes.create')
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function destroy(Shoe $shoe)
    {
        try {
            $shoe->delete();

            if (!empty($shoe->thumbnail) && Storage::exists($shoe->thumbnail)) {
                Storage::delete($shoe->thumbnail);
            }
            return back()
                ->with('success', true);

        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

}