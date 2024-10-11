@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Shoes</h1>
        <p class="mb-4">Đây là giao diện giúp quản lý <strong>Shoe</strong> của website</p>

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
                <h6 class="m-0 font-weight-bold text-primary">Danh sách Shoes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Shoe_name</th>
                                <th>Brand_id</th>
                                <th>Thumbnail</th>
                                <th>Price</th>
                                <th>View</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Shoe_name</th>
                                <th>Brand_id</th>
                                <th>Thumbnail</th>
                                <th>Price</th>
                                <th>View</th>
                                <th>Thao tác</th>

                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($shoes as $shoe)
                                <tr>
                                    <td>{{ $shoe->id_shoe }}</td>
                                    <td>{{ $shoe->shoe_name }}</td>
                                    <td>
                                        {{ $shoe->brand->brand_name }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('/storage/' . $shoe->thumbnail) }}" alt="" width="100px"
                                            height="100px">
                                    </td>
                                    <td>{{ $shoe->price }}</td>
                                    <td>{{ $shoe->view }}</td>
                                    <td>
                                        <a href="{{ route('shoes.show', $shoe->id_shoe) }}" class="btn btn-primary">
                                            <i class="fas fa-info-circle"></i> <!-- Icon cho 'Chi tiết' -->
                                        </a>

                                        <a href="{{ route('shoes.edit', $shoe->id_shoe) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i> <!-- Icon cho 'Sửa' -->
                                        </a>

                                        <form action="{{ route('shoes.destroy', $shoe->id_shoe) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirm('Chắc chắn xóa ❓❓❓');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
                                                style="border:none; background-color:#ffcccc; padding:7px; border-radius:5px;">
                                                <i class="fas fa-trash" style="color:red; font-size:20px;"></i>
                                                <!-- Icon thùng rác màu đỏ -->
                                            </button>
                                        </form>


                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- Phân trang --}}
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            {{ $shoes->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
