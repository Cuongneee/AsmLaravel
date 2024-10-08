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



    <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>Giới thiệu</h1>
                    <p>
                        Chào mừng bạn đến với <strong>Jump Shoes Store</strong>, điểm đến hoàn hảo cho những tín đồ thời trang
                         và yêu thích giày dép. Chúng tôi tự hào mang đến cho bạn bộ sưu tập giày đa dạng đến từ các thương hiệu nổi tiếng
                          phù hợp với mọi phong cách và nhu cầu của bạn. Với chất lượng hàng đầu và dịch vụ chăm sóc khách hàng tận tâm,
                          <strong>Jump Shoes Store</strong> cam kết mang lại trải nghiệm mua sắm trực tuyến dễ dàng và đáng tin cậy.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="/client/assets/img/about-hero.svg" alt="About Hero">
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Dịch vụ của chúng tôi</h1>
                <p>
                    Đến với <strong>Jump Shoes Store</strong> khách hàng sẽ được hỗ trợ cũng như nhận
                    được rất nhiều ưu đãi hấp dẫn.
                </p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Chuyển phát nhanh</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Hoàn trả miễn phí</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Giảm 30% vào các dịp lễ</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">Hỗ trợ 24/7</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    @include('client.components.brand')
@endsection
