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



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./client/assets/img/banner_img_01.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Jump</b> Shoes Store</h1>
                                <h3 class="h2">Nơi cung cấp cho bạn những mẫu giày chất lượng</h3>
                                <p>
                                    Đến với Jump Shoes Store, bạn sẽ được trải nghiệm những mẫu giày đặc biệt và chất liệu
                                    hoàn toàn cao cấp đến từ những thương hiệu giày nổi tiếng trên thế giới. Với hơn 10 năm
                                    kinh doanh, chung tối
                                    mong muốn đem đên những sản phẩm chính hãng đến tay khách hàng.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./client/assets/img/banner_img_02.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Mẫu giày đặc biệt</h1>
                                <h3 class="h2"> Converse Chuck Taylor All Star High ‘Yeti Snowman’ </h3>
                                <p>
                                    Mẫu giày bản <strong>Giới hạn</strong> này được lấy ý tưởng từ Yeti Snowman trong truyền
                                    thuyết Bắc Âu
                                    đem lại cho khách hàng sự mới lạ cũng như cá tính.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./client/assets/img/banner_img_03.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Đa dạng các mẫu giày</h1>
                                <h3 class="h2">Chúng tôi có đầy đủ các mẫu giày trên thị trường </h3>
                                <p>
                                    Từ giày thể thao, giày sneaker năng động đến giày cao gót sang trọng và giày da công sở,
                                    chúng tôi cam kết mang đến sản phẩm chất lượng cao với kiểu dáng hiện đại, hợp xu hướng.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Các Brands nổi tiếng</h1>
                <p>
                    Ở đây chúng tôi có những brands giày nổi tiếng và chính hãng
                    mong muốn được đem đến tay khách hàng với sự trải nghiệm tuyệt vời.

                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./client/assets/img/brand_img_01.png"
                        class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Jordan</h5>
                <p class="text-center"><a class="btn btn-success">Xem ngay</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./client/assets/img/brand_img_02.png"
                        class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Ananas</h2>
                <p class="text-center"><a class="btn btn-success">Xem ngay</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./client/assets/img/brand_img_03.png"
                        class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Converse</h2>
                <p class="text-center"><a class="btn btn-success">Xem ngay</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Top 3 sản phảm được xem nhiều nhất</h1>
                    <p>
                        Dưới đây là 3 sản phẩm được người dùng quan tâm cũng như là mua
                        nhiều nhất và nhận được phản hồi tích cực tại Website.
                    </p>
                </div>
            </div>

            <div class="row">
                @foreach ($loadView as $item)
                    <div class="col-12 col-md-4 mb-4">

                        <div class="card h-100">

                            <a href="">
                                <img src="{{ asset('/storage/' . $item->thumbnail) }}" class="card-img-top" alt="..." height="350px">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="fa fa-star-half-alt text-warning"></i>
                                    </li>
                                    <li class="text-muted text-right">{{ $item->price }} đ</li>
                                </ul>
                                <a href="shop-single.html"
                                    class="h2 text-decoration-none text-dark">{{ $item->shoe_name }}</a>
                                <p class="card-text">
                                    {{ $item->description }}
                                </p>
                                <p class="text-muted">{{ $item->view }} lượt xem</p>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Featured Product -->

    @include('client.components.brand')
@endsection
