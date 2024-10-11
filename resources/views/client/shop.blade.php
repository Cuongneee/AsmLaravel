@extends('client.layouts.master')
@section('content')
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('client.search') }}" method="POST" class="modal-content modal-body border-0 p-0">
                @csrf
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="word"
                        placeholder="Tìm kiếm ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Danh mục</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Brands
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">

                            @foreach ($brands as $brand)
                                <li><a class="text-decoration-none"
                                        href="{{ route('client.shop', $brand->id_brand) }}">{{ $brand->brand_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="{{ '/shop' }}">Tất cả sản
                                    phẩm</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 pb-5">
                        <a href="{{ '/highPrice' }}" class="btn btn-primary">Giá cao</a>
                        <a href="{{ '/lowPrice' }}" class="btn btn-danger">Giá thấp</a>

                    </div>
                </div>

                {{-- Sản phẩm --}}

                <div class="row">
                    @foreach ($shoes as $shoe)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid custom-height"
                                        src="{{ asset('/storage/' . $shoe->thumbnail) }}">
                                    <div
                                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white" href="{{ '/shop-single' }}"><i
                                                        class="far fa-heart"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2"
                                                    href="{{ route('client.shop-single', $shoe->id_shoe) }}"><i
                                                        class="far fa-eye"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i
                                                        class="fas fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('client.shop-single', $shoe->id_shoe) }}"
                                        class="h3 text-decoration-none">{{ $shoe->shoe_name }}</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>Brand: {{ $shoe->brand_name }}</li>
                                        <li class="pt-2">
                                            <span
                                                class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span
                                                class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span
                                                class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span
                                                class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span
                                                class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-muted fa fa-star"></i>
                                            <i class="text-muted fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0">{{ $shoe->price }} đ</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Phân trang --}}
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        {{ $shoes->links() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- End Content -->
    @include('client.components.brand')
@endsection
<style>
    .card>img {
        height: 300px;
        object-fit: cover;
    }
</style>
