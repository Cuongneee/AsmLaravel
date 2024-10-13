@extends('admin.layouts.master')
@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .user-info-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-info-container h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="user-info-container">
        <h2>Thông Tin Người Dùng</h2>
        <form>
            <div class="mb-3">
                <label for="userName" class="form-label">Avata: </label>
                <img src="{{ asset('/storage/' . $user->avata) }}" alt="User Image" class="profile-img" height="100px" width="150px">
            </div>

            <div class="mb-3">
                <label for="userName" class="form-label">Tên Người Dùng</label>
                <input type="text" class="form-control" id="userName" value="{{ $user->full_name }}" readonly>
            </div>

            <div class="mb-3">
                <label for="userName" class="form-label">UserName</label>
                <input type="text" class="form-control" id="userName" value="{{ $user->user_name }}" readonly>
            </div>

            <div class="mb-3">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="userEmail" value="{{ $user->email }}" readonly>
            </div>

            <div class="mb-3">
                <label for="userPhone" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" id="userPhone" value="{{ $user->phone }}" readonly>
            </div>
            <label for="userPhone" class="form-label text-info">Vai trò: <strong>{{ $user->role }}</strong></label>

            <div class="mb-3">
                <label for="userPhone" class="form-label">Trạng thái:

                    @if ($user->active)
                        <span class="badge bg-success text-white">Kích hoạt</span>
                    @else
                        <span class="badge bg-danger text-white">Tạm ẩn</span>
                    @endif

                </label>

            </div>

            <a href="{{ route('users.index') }}" class="btn btn-primary">Quay lại danh sách</a>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
@endsection
