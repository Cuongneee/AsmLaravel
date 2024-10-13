@extends('client.layouts.master')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Thanh toán</h2>

            @if (session('cart') && count(session('cart')) > 0)
                <form action="{{ route('processCheckout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Thông tin người mua hàng -->
                        <div class="col-lg-6">
                            <h4>Thông tin người mua hàng</h4>
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="full_name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ giao hàng</label>
                                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Xem lại giỏ hàng -->
                        <div class="col-lg-6">
                            <h4>Đơn hàng của bạn</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('cart') as $id => $details)
                                        <tr>
                                            <td>{{ $details['shoe_name'] }}</td>
                                            <td>{{ $details['quantity'] }}</td>
                                            <td>{{ number_format($details['price'] * $details['quantity']) }} đ</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" class="text-right"><strong>Tổng cộng:</strong></td>
                                        <td><strong>{{ number_format($total) }} đ</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg">Hoàn tất thanh toán</button>
                        <a href="{{ '/shop' }}" class="btn btn-info btn-lg">Quay lại</a>
                    </div>
                </form>
            @else
                <p class="text-center">Giỏ hàng của bạn đang trống.</p>
            @endif
        </div>
    </section>
@endsection
