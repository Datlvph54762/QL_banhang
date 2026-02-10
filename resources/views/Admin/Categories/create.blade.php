@extends('admin.layout.app');

@section('title', 'Thêm danh mục')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Thêm Danh mục</h5>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST" >
                @csrf

                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Mô tả</label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Nhập mô tả sản phẩm">{{ old('description') }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Lưu sản phẩm
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection