@extends('admin.layout.app')

@section('title', 'Edit biến thể')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Edit biến thể sản phẩm </h5>
            
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="d-flex">
                    <div class="col-6 mb-3">
                        <label class="form-label fw-bold">Color</label>
                        <select name="color_id" id="color_id" class="form-select form-control">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" @selected($color->id == $productVariant->color_id  )>
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
                                <option value="{{ $size->id }}"
                                    @selected($size->id == $productVariant->size_id)>
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
                    <label class="form-label fw-bold">Price (VND)</label>
                    <input type="text" name="price" class="form-control" value="{{ number_format($productVariant->price, 0, ',', '.') }}">
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Sale</label>
                    <input type="text" name="sale" class="form-control" value="{{ number_format($productVariant->sale, 0, ',', '.') }}">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Số lượng</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $productVariant->quantity }}">
                    @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Hình ảnh</label>
                    <input type="file" name="image" class="form-control">
                    @if($productVariant->image)
                        <img class="mt-2" src="{{ asset('storage/' . $productVariant->image) }}" width="80" height="80">
                    @endif
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Cập nhật 
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection