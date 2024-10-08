<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Shoe;

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
        // dd($brand);
        return view('admin.shoes.show', compact('shoe'));

    }

    public function create()
    {
        return view('admin.shoes.create');
    }

    public function store()
    {

    }

    public function edit(Shoe $shoe)
    {
        return view('admin.shoes.edit', compact('shoe'));
    }

}