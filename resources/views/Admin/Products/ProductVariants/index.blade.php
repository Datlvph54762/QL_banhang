@extends('admin.layout.app')

@section('title', 'Danh sách Biến thể')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Danh sách Sản phẩm</h5>
            <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Thêm
                mới</a>
        </div>
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        <li>{{ session('success') }}</li>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Sale</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Màu sắc</th>
                            <th scope="col">Size</th>
                            <th scope="col" class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productVariant as $variant)
                            <tr>
                                <td>{{ $variant->id }}</td>
                                <td>

                                </td>
                                <td>{{ $variant->price }}</td>
                                <td>{{ $variant->sale }}</td>
                                <td>
                                    {{ $variant->quantity }}
                                </td>
                                <td>{{ $variant->color->name }}</td>
                                <td>{{ $variant->size->name }}</td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-outline-warning" title="Sửa">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" title="Xóa"
                                        onclick="return confirm('Bác có chắc muốn xóa không?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection