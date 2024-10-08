@extends('admin.layouts.master')

@section('content')
    <div class="container" style="">
        <label for="" class="text-info" style="font-size: 30px">Chỉnh sửa Brand</label>


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
            <form action="{{ route('brands.update', $brand->id_brand) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Tên brand:</label>
                    <input type="text" class="form-control" id="text" placeholder="Nhập tên brand" name="brand_name"
                        value="{{ $brand->brand_name }}">
                </div>

                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" @checked($brand->is_active) name="is_active"
                            value="1"> Kích hoạt
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Lưu lại</button>
            </form>

            <a href="{{ route('brands.index') }}" class="btn btn-info mt-3">Quay lại danh sách</a>
        </div>
    </div>
@endsection
