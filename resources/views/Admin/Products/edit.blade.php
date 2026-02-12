@extends('admin.layout.app')

@section('title', 'Cập nhật sản phẩm')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Edit sản phẩm</h5>
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->id)  }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="d-flex">
                    <div class="col-6 mb-3 pe-2">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 mb-3 ps-2">
                        <label class="form-label fw-bold">Danh mục sản phẩm</label>
                        <select name="category_id" id="category_id" class="form-select form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id == $category->id ? 'selected' : '' )}}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Mã code sản phẩm</label>
                    <input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}">
                    @error('product_code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Chất liệu</label>
                    <input type="text" name="material" class="form-control" value="{{ $product->material }}">
                    @error('material')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Hình ảnh</label>
                    <input type="file" name="image" class="form-control">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="70" height="80">
                    @endif
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Mô tả</label>
                    <textarea name="description" rows="4" class="form-control"
                        placeholder="Nhập mô tả sản phẩm">{{ old('description', $product->description) }}</textarea>
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