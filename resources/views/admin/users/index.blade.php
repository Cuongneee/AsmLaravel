@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Brands</h1>
        <p class="mb-4">Đây là giao diện giúp quản lý <strong>Users</strong> của website</p>

        @if (session()->has('success') && !session()->get('success'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        @if (session()->has('success') && session()->get('success'))
            <div class="alert alert-success">
                Thao tác thành công✅
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Fullname</th>
                                <th>Avata</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Fullname</th>
                                <th>Avata</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>

                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id_user }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>
                                        <img src="{{ asset('/storage/' . $user->avata) }}" alt="" width="120px"
                                            height="100px">
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->active)
                                            <span class="badge bg-success text-white">Hiển thị</span>
                                        @else
                                            <span class="badge bg-danger text-white">Tạm ẩn</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('users.show', $user->id_user) }}" class="btn btn-primary">
                                            <i class="fas fa-info-circle"></i> <!-- Icon cho 'Chi tiết' -->
                                        </a>

                                        @if ($user->active)
                                            <form action="{{ route('userDeactivate', $user->id_user) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirm('Tạm thời ẩn ❓❓❓');">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-danger" type="submit"
                                                    style="border:none; background-color: #ffcccc; padding: 10px; border-radius: 50%; color: red;">
                                                    <i class="fas fa-eye-slash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('userActivate', $user->id_user) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirm('Khôi phục ❓❓❓');">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success" type="submit"
                                                    style="border:none; background-color: #ccffcc; padding: 10px; border-radius: 50%; color: green;">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- Phân trang --}}
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
