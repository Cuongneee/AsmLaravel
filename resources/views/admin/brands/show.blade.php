@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Tên Brand: {{ $brand->brand_name }}</h5>

                        <p>
                            @if ($brand->is_active)
                                <span class="badge bg-success text-white">Kích hoạt</span>
                            @else
                                <span class="badge bg-danger text-white">Tạm ẩn</span>
                            @endif
                        </p>

                        <a href="{{ route('brands.index') }}" class="btn btn-primary">Quay lại danh sach</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
