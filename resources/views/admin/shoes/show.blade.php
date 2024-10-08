@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{$shoe->thumbnail}}" class="card-img" alt="Product Image" height="350px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">Tên Sản Phẩm: {{ $shoe->shoe_name }}</h4>
                        <h5>Brand: {{$shoe->brand->brand_name}}</h5>
                        <p class="card-text">{{ $shoe->description }}</p>
                        <p class="card-text">Giá: {{ $shoe->price }}</p>
                        <p class="card-text">Lượt xem: {{ $shoe->view }}</p>
                        <p class="card-text">Đặc điểm: {{ $shoe->specification }}</p>

                        <a href="{{route('shoes.index')}}" class="btn btn-primary">Quay lại danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
