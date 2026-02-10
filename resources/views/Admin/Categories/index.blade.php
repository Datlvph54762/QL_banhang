@extends('admin.layout.app')

@section('title', 'Category')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Danh sách Danh mục</h5>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Thêm
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
                            <th scope="col">Tên Danh mục</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td><span>{{ $category->description }}</span></td>
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