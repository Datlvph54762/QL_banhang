@extends('admin.layout.app')

@section('title', 'Danh sách Biến thể')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Danh sách biến thể Sản phẩm <i class="fas fa-arrow-right"></i> <span
                    class="text-dark">{{ $product->name }}</span></h5>
            <a href="{{ route('admin.products.productVariants.create', $product->id) }}" class="btn btn-sm btn-primary"><i
                    class="fas fa-plus"></i> Thêm
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
                            <th scope="col">Giá ( VND )</th>
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
                                    @if($variant->image)
                                        <img src="{{ asset('storage/' . $variant->image) }}" width="60" height="60">
                                    @endif
                                </td>
                                <td>{{ number_format($variant->price, 0, ',', '.') }} </td>
                                <td>{{ number_format($variant->sale, 0, ',', '.') }} </td>
                                <td>{{ $variant->quantity }}</td>
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