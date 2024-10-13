@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Chi tiết Bình luận</h2>

        <div class="card mb-3">
            <div class="card-header">
                <h5>Thông tin Bình luận</h5>
            </div>
            <div class="card-body">
                <p><strong>STT bình luận:</strong> {{ $comment->id_comment }}</p>
                <p><strong>Nội dung:</strong> {{ $comment->content }}</p>
                <p><strong>Ngày tạo:</strong> {{ $comment->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h5>Thông tin Người bình luận</h5>
            </div>
            <div class="card-body">
                @if ($comment->user)
                    <img src="{{ asset('/storage/' . $comment->user->avata) }}" alt="Avatar" class="avatar rounded-circle"
                        width="55px" height="50px">
                    <p><strong>Tên người dùng:</strong> {{ $comment->user->user_name }}</p>
                    <p><strong>Email:</strong> {{ $comment->user->email }}</p>
                @else
                    <p>Người dùng không xác định</p>
                @endif
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h5>Thông tin Sản phẩm</h5>
            </div>
            <div class="card-body">
                @if ($comment->shoe)
                    <img src="{{ asset('/storage/' . $comment->shoe->thumbnail) }}" alt="Sản phẩm" class="img-fluid"
                        width="100px">
                    <p><strong>Tên Sản phẩm:</strong> {{ $comment->shoe->shoe_name }}</p>

                    <p><strong>Giá:</strong> {{ number_format($comment->shoe->price, 0, ',', '.') }} VND</p>
                @else
                    <p>Sản phẩm không xác định</p>
                @endif
            </div>
        </div>

        <a href="{{ route('comments.index') }}" class="btn btn-primary">Quay lại danh sách bình luận</a>
    </div>
@endsection
