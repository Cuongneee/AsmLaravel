@extends('admin.layouts.master')

@section('content')
    <div class="container" style="">
        <label for="" class="text-info" style="font-size: 30px">Chỉnh sửa Shoe</label>


        @if (session()->has('success') && !session()->get('success'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        @if (session()->has('success') && session()->get('success'))
            <div class="alert alert-success">
               Thao tác thành công✅
            </div>
        @endif

        <div class="">
            <form action="{{ route('shoes.update', $shoe->id_shoe) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Tên shoe:</label>
                    <input type="text" class="form-control" id="text" placeholder="Nhập tên shoe" name="shoe_name"
                        value="{{ old('shoe_name', $shoe->shoe_name) }}">
                </div>

                <label for="">Brand_id</label>
                <select class="form-control" aria-label="Default select example" name="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id_brand }}" @if ($brand->id_brand == $shoe->brand_id) selected @endif>
                            {{ $brand->brand_name }}</option>
                    @endforeach
                </select>

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Thumbnail:</label>
                    <img src="{{ asset('/storage/' . $shoe->thumbnail) }}" alt="" width="250px" height="250px"
                        class="mb-3">
                    <input type="file" class="form-control" id="text" name="thumbnail">
                </div>

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Description:</label>
                    <textarea name="description" id="" cols="105" rows="5" placeholder="Nhập description">
                        {{ old('description', $shoe->description) }}
                    </textarea>
                </div>


                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="text" placeholder="Nhập price" name="price"
                        value="{{ old('price', $shoe->price) }}">
                </div>

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Specification:</label>
                    <input type="text" class="form-control" id="text" placeholder="Nhập specification"
                        name="specification" value="{{ old('specification', $shoe->specification) }}">
                </div>

                <button type="submit" class="btn btn-primary">Lưu lại</button>
            </form>

            <a href="{{ route('shoes.index') }}" class="btn btn-info mt-3">Quay lại danh sách</a>
        </div>
    </div>
@endsection
