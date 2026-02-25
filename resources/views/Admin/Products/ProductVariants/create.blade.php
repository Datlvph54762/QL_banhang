@extends('admin.layout.app')

@section('title', 'THêm biến thể')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Thêm biến thể sản phẩm <i class="fas fa-arrow-right"></i> <span
                    class="text-dark">{{ $product->name }}</span></h5>
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.productVariants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="d-flex">
                    <div class="col-6 mb-3">
                        <label class="form-label fw-bold">Color</label>
                        <select name="color_id" id="color_id" class="form-select form-control">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" {{ old('color_id') == $color->id ? 'selected' : '' }}>
                                    {{ $color->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('color_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 mb-3 ps-2">
                        <label class="form-label fw-bold">Size</label>
                        <select name="size_id" id="size_id" class="form-select form-control">
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}" {{ old('size_id') == $size->id ? 'selected' : '' }}>
                                    {{ $size->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('size_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">price (VND)</label>
                    <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Sale</label>
                    <input type="text" name="sale" class="form-control" value="{{ old('sale') }}">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Số lượng</label>
                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                    @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Hình ảnh</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
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