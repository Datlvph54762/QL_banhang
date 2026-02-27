@extends('admin.layout.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Chi tiết Sản phẩm -> <span class="text-dark">{{ $product->name }}</span>
            </h5>
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <div class="card-body d-flex">
            <div class="col-5">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="550" height="600">
                @endif
            </div>
            <div class="col-7">
                <h3 class="display-6 fw-bold mb-4">{{ $product->name }}</h3>

                <table class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                            <th class="ps-0" style="width: 150px;">Danh mục</th>
                            <td class="text-secondary">{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <th class="ps-0">Mã sản phẩm</th>
                            <td><code>{{ $product->product_code }}</code></td>
                        </tr>
                        <tr>
                            <th class="ps-0">Chất liệu</th>
                            <td>{{ $product->material }}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" colspan="2">
                                <div class="fw-bold mb-2">Mô tả sản phẩm</div>
                                <div class="fw-normal text-muted">
                                    {{ $product->description }}
                                </div>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <hr>

                <h5 class="fw-bold mb-3"><i class="fas fa-boxes me-2"></i>Danh sách biến thể</h5>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Hình ảnh</th>
                                <th>Màu sắc</th>
                                <th>Kích thước</th>
                                <th>Giá bán (VND)</th>
                                <th>Giá giảm</th>
                                <th class="text-center">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($product->Variant as $item)
                                <tr>
                                    <td class="text-center">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" width="50" height="50"
                                                class="rounded border">
                                        @else
                                            <span class="text-muted small">Không có ảnh</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->color->name ?? 'N/A' }}</td>
                                    <td>{{ $item->size->name ?? 'N/A' }}</td>
                                    <td class="fw-bold text-primary">
                                        {{ number_format($item->price, 0, ',', '.') }}
                                    </td>
                                    <td class="text-danger">
                                        {{ $item->sale ? number_format($item->sale, 0, ',', '.') : '-' }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge {{ $item->quantity > 0 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $item->quantity }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Sản phẩm này chưa có biến thể nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection