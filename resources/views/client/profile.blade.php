@extends('client.layouts.master')
@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-header {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info {
            margin-top: 20px;
            text-align: left;
        }

        .profile-info h2 {
            margin-bottom: 10px;
        }

        .profile-info p {
            margin-bottom: 5px;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #74b7ff;
        }

        .btn-block {
            width: 100%;
        }
    </style>

    <div class="container">

        @session('message')
            <div class="alert text-success">{{ session('message') }}</div>
        @endsession

        @session('error')
            <div class="alert text-danger">{{ session('message') }}</div>
        @endsession

        <form action="{{ route('updateProfile', session()->get('user.id_user')) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="profile-header text-center">
                <img src="{{ asset('/storage/' . $user->avata) }}" alt="User Image" class="profile-img">
                <input type="file" name="avata">
                <div class="profile-info">
                    <h2><input type="text" class="form-control" value="{{ old('full_name', $user->full_name) }}"
                            name="full_name"></h2>
                    <p>UserName: <input type="text" class="form-control" value="{{ old('user_name', $user->user_name) }}"
                            name="user_name"></p>
                    <p>Email: <input type="email" class="form-control" value="{{ old('email', $user->email) }}"
                            name="email"></p>
                    <p>Phone: <input type="number" class="form-control" value="{{ old('phone', $user->phone) }}"
                            name="phone"></p>

                </div>
            </div>
            <div class="profile-actions mt-4 mb-5">
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success btn-block">Chỉnh sửa</button>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('formChangePass', session()->get('user.id_user')) }}"
                            class="btn btn-primary btn-block">Đổi mật khẩu</a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('client.index') }}" class="btn btn-info btn-block">Quay lại trang chủ</a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('logout') }}" class="btn btn-warning btn-block">Đăng xuất</a>
                    </div>
                </div>
            </div>

        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
