@extends('client.layouts.master')

@section('content')
    <!-- Cart Section -->
    <section class="py-5">
        <div class="container">
            <h3 class="text-center mb-4">Giỏ hàng của bạn</h3>

            <!-- Check if the cart has products -->
            @if (session('cart') && count(session('cart')) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach (session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity']; @endphp
                            <tr>
                                <td>
                                    <img src="{{ asset('/storage/' . $details['thumbnail']) }}" alt="Product Image"
                                        width="110px" height="110px">
                                </td>
                                <td>{{ $details['shoe_name'] }}</td>
                                <td>{{ number_format($details['price'], 0, ',', '.') }} đ</td>
                                <td>
                                    <form action="{{ route('updateCart', $id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <div class="input-group">
                                            <button type="submit" class="btn btn-outline-secondary" name="quantity"
                                                value="{{ $details['quantity'] - 1 }}"
                                                {{ $details['quantity'] <= 1 ? 'disabled' : '' }}>-</button>
                                            <input type="text" name="quantity" value="{{ $details['quantity'] }}"
                                                class="form-control text-center" style="width: 50px;" readonly>
                                            <button type="submit" class="btn btn-outline-secondary" name="quantity"
                                                value="{{ $details['quantity'] + 1 }}">+</button>
                                        </div>
                                    </form>
                                </td>
                                <td>{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }} đ</td>
                                <td>
                                    <form action="{{ route('removeFromCart', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-right">
                    <h4>Tổng tiền: {{ number_format($total, 0, ',', '.') }} đ</h4>
                    <a href="{{ route('checkout') }}" class="btn btn-success">Thanh toán</a>
                </div>
            @else
                <p class="text-center">Giỏ hàng của bạn đang trống.</p>
                <a href="{{ '/shop' }}" class="btn btn-primary">Tiếp tục mua sắm</a>
            @endif
        </div>
    </section>
@endsection
