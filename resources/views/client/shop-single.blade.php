@extends('client.layouts.master')

@section('content')
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q"
                        placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Open Content -->
    <section class="bg-light">

        @session('message')
            <div class="alert text-success text-center">{{ session('message') }}</div>
        @endsession

        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img" src="{{ asset('/storage/' . $shoes->thumbnail) }}" alt="Card image cap"
                            height="500px" id="product-detail">
                    </div>

                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $shoes->shoe_name }}</h1>
                            <p class="h3 py-2">{{ $shoes->price }} đ</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Đánh giá 4.8 | lượt xem: {{ $shoes->view }}</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $shoes->brand_name }}</strong></p>
                                </li>
                            </ul>

                            <h6>Mô tả:</h6>
                            <p>{{ $shoes->description }}</p>

                            <h6>Đặc điểm:</h6>
                            <p>{{ $shoes->specification }}</p>

                            <form action="{{ route('addToCart', $shoes->id_shoe) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" id="product-quanity" value="1">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Số lượng
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success"
                                                    id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary"
                                                    id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success"
                                                    id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocart">Thêm
                                    vào giỏ hàng</button>
                            </form>


                        </div>
                    </div>
                </div>

                <!-- Start Comments Section -->
                <section class="py-5">
                    <div class="container">
                        <div class="row text-left p-2 pb-3">
                            <h4>Bình luận</h4>
                        </div>

                        <!-- Display Comments -->
                        <div class="comments-list">
                            @foreach ($comments as $comment)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        @if ($comment->user)
                                            <h6 class="card-title">
                                                <img src="{{ asset('/storage/' . $comment->user->avata) }}" alt="Avatar"
                                                    class="avatar rounded-circle" height="30px" width="32px">
                                                {{ $comment->user->user_name }}
                                            </h6>
                                        @else
                                            <h6 class="card-title">Người dùng không xác định</h6>
                                        @endif
                                        <p class="card-text">{{ $comment->content }}</p>
                                        <small class="text-muted">{{ $comment->created_at->format('d/m/Y H:i') }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Comment Form -->
                        @if (session('user.id_user'))
                            <div class="comment-form">
                                <form action="{{ route('storeComment', $shoes->id_shoe) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Nhập bình luận của bạn:</label>
                                        <textarea class="form-control" id="comment" name="content" rows="3"></textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Gửi bình luận</button>
                                </form>
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để có thể bình luận.
                            </div>
                        @endif
                    </div>
                </section>
                <!-- End Comments Section -->

            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Sản phẩm liên quan</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
                @foreach ($sameBrand as $brand)
                    <div class="p-2 pb-3">

                        <div class="product-wap card rounded-0">

                            <div class="card rounded-0">
                                <img class="card-img rounded-0" src="{{ asset('/storage/' . $brand->thumbnail) }}"
                                    height="350px">
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html"><i
                                                    class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2"
                                                href="{{ route('client.shop-single', $brand->id_shoe) }}"><i
                                                    class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i
                                                    class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">{{ $brand->shoe_name }}</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Brand: {{ $brand->brand_name }}</li>
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
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">{{ $brand->price }}</p>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
            <form action="{{ route('addToCart', $shoes->id_shoe) }}" method="POST">
                @csrf
                <input type="hidden" name="quantity" id="product-quanity" value="1">
                <div class="row">
                    <div class="col-auto">
                        <ul class="list-inline pb-3">
                            <li class="list-inline-item text-right">
                                Số lượng
                            </li>
                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                        </ul>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocart">Thêm vào giỏ
                    hàng</button>
            </form>

        </div>
    </section>
    <!-- End Article -->
@endsection

<script>
    document.getElementById('btn-plus').addEventListener('click', function() {
        let quantity = parseInt(document.getElementById('var-value').textContent);
        quantity++;
        document.getElementById('var-value').textContent = quantity;
        document.getElementById('product-quanity').value = quantity;
    });

    document.getElementById('btn-minus').addEventListener('click', function() {
        let quantity = parseInt(document.getElementById('var-value').textContent);
        if (quantity > 1) {
            quantity--;
            document.getElementById('var-value').textContent = quantity;
            document.getElementById('product-quanity').value = quantity;
        }
    });
</script>
