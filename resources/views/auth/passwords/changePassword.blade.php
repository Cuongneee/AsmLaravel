@extends('client.layouts.master')
@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .password-reset-container {
            max-width: 420px;
            margin: 60px auto;
            padding: 35px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .password-reset-container:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .password-reset-container h2 {
            margin-bottom: 25px;
            font-weight: bold;
            color: #343a40;
            text-align: center;
            font-size: 24px;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
        }

        .form-control {
            border-radius: 6px;
            border: 1px solid #ced4da;
            padding: 10px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            padding: 10px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-primary:active {
            background-color: #004494;
            transform: translateY(0);
        }

        .input-group-text {
            background-color: #f0f0f0;
            border-radius: 0 6px 6px 0;
            border: none;
            padding: 0 10px;
        }

        .input-group .form-control {
            border-right: 0;
        }

        .input-group .form-control:focus {
            border-right: 0;
        }

        .text-muted {
            font-size: 13px;
            margin-top: 15px;
            text-align: center;
            color: #6c757d;
        }
    </style>

    <div class="password-reset-container">
        <h2>Đổi Mật Khẩu</h2>

        @if (session('message'))
            <div class="alert alert-danger mt-3">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('updatePassword', session()->get('user.id_user')) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="currentPassword" class="form-label">Mật khẩu hiện tại</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="currentPassword" placeholder="Nhập mật khẩu hiện tại"
                        name="current_password">
                    <span class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </span>

                </div>
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="newPassword" class="form-label">Mật khẩu mới</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="newPassword" placeholder="Nhập mật khẩu mới"
                        name="new_password">
                    <span class="input-group-text">
                        <i class="bi bi-shield-lock-fill"></i>
                    </span>

                </div>
                @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Xác nhận mật khẩu mới</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Xác nhận mật khẩu mới"
                        name="new_password_confirmation">
                    <span class="input-group-text">
                        <i class="bi bi-check-circle-fill"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Đổi Mật Khẩu</button>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
@endsection
