@extends('admin.layout.app')

@section('title', 'Quản lí sản phẩm')

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
                            <th scope="col">Danh mục sản phẩm</th>
                            <th scope="col">Code Sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Description</th>
                            <th scope="col">Material</th>
                            <th scope="col" class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" width="60" height="60ư\">
                                    @endif
                                </td>
                                <td>
                                    {{ Str::limit($product->description, 50, '...') }}
                                </td>
                                <td>{{ $product->material }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.products.productVariants.index', $product->id) }}"
                                        class="btn btn-sm btn-outline-warning" title="Show_variant">
                                        <i class="fa-solid fa-layer-group"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="btn btn-sm btn-outline-warning" title="Sửa">
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
    <div class="mt-3 d ">
        {{ $products->links() }}
    </div>
@endsection