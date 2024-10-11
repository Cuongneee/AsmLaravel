@extends('admin.layouts.master')

@section('content')
    <div class="container" style="">
        <label for="" class="text-info" style="font-size: 30px">Thêm mới Shoe</label>


        @if (session()->has('success') && !session()->get('success'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="">
            <form action="{{ route('shoes.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Tên shoe:</label>
                    <input type="text" class="form-control" id="text" placeholder="Nhập tên shoe" name="shoe_name"
                        value="{{ old('shoe_name') }}">
                </div>

                <label for="">Brand_id</label>
                <select class="form-control" aria-label="Default select example" name="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id_brand}}">{{ $brand->brand_name }}</option>
                    @endforeach
                </select>

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Thumbnail:</label>
                    <input type="file" class="form-control" id="text" name="thumbnail">
                </div>

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Description:</label>
                    <textarea name="description" id="" cols="105" rows="5" placeholder="Nhập description"
                        value="{{ old('description') }}">

                    </textarea>
                </div>

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="text" placeholder="Nhập price" name="price"
                        value="{{ old('price') }}">
                </div>

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Specification:</label>
                    <input type="text" class="form-control" id="text" placeholder="Nhập specification"
                        name="specification" value="{{ old('specification') }}">
                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>

            <a href="{{ route('shoes.index') }}" class="btn btn-info mt-3">Quay lại danh sách</a>
        </div>
    </div>
@endsection
