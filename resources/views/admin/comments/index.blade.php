@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Comments</h1>
        <p class="mb-4">Đây là giao diện giúp quản lý <strong>Comments</strong> của website</p>

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
                <h6 class="m-0 font-weight-bold text-primary">Danh sách Comments</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ShoeName</th>
                                <th>UserName</th>
                                <th>Content</th>
                                <th>Created_at</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>ShoeName</th>
                                <th>UserName</th>
                                <th>Content</th>
                                <th>Created_at</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>

                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id_comment }}</td>
                                    <td>{{ $comment->shoe->shoe_name }}</td>
                                    <td>{{ $comment->user->user_name }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>

                                    <td>
                                        @if ($comment->active)
                                            <span class="badge bg-success text-white">Hiển thị</span>
                                        @else
                                            <span class="badge bg-danger text-white">Tạm ẩn</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('comments.show', $comment->id_comment) }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-info-circle"></i>
                                        </a>

                                        {{-- Xóa mềm --}}
                                        @if ($comment->active)
                                            {{-- Xóa mềm: Nếu is_active = 1 thì hiển thị nút Ẩn --}}
                                            <form action="{{ route('comments.hide', $comment->id_comment) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirm('Tạm thời ẩn ❓❓❓');">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-danger" type="submit"
                                                    style="border:none; background-color: #ffcccc; padding: 10px; border-radius: 50%; color: red;">
                                                    <i class="fas fa-eye-slash"></i> <!-- Icon cho 'Ẩn' -->
                                                </button>
                                            </form>
                                        @else
                                            {{-- Khôi phục: Nếu is_active = 0 thì hiển thị nút Khôi phục --}}
                                            <form action="{{ route('comments.restore', $comment->id_comment) }}"
                                                method="POST" style="display:inline-block;"
                                                onsubmit="return confirm('Khôi phục ❓❓❓');">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success" type="submit"
                                                    style="border:none; background-color: #ccffcc; padding: 10px; border-radius: 50%; color: green;">
                                                    <i class="fas fa-eye"></i> <!-- Icon cho 'Khôi phục' -->
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
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
