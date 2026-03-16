@extends('client.layout.app')

@section('title', 'Trang chủ')

@section('content')
    <div class="container">
        <div class="link-title d-flex mx-5 pt-4 px-4">
            <a href="{{ route('client.home') }}" class="text-decoration-none text-dark link-success ">
                <p>Trang chủ ></p>
            </a>
            <a href="" class="text-decoration-none text-success fw-bold">
                <p class="ms-2"> Sản phẩm </p>
            </a>
        </div>
        <div class="content py-3">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="category-sidebar p-3 shadow-sm rounded-4 border bg-white sticky-top" style="top: 20px;">
                        <h5 class="fw-bold mb-3 border-bottom pb-2 text-uppercase"
                            style="letter-spacing: 1px; font-size: 1rem;">
                            Danh mục
                        </h5>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('client.products.index') }}"
                                class="list-group-item list-group-item-action border-0 px-0 py-2 d-flex justify-content-between align-items-center {{ !request('category_id') ? 'fw-bold text-success' : '' }}">
                                Tất cả sản phẩm
                            </a>
                            @foreach ($categories as $category)
                                <a href="{{ route('client.products.index', ['category_id' => $category->id]) }}"
                                    class="list-group-item list-group-item-action border-0 px-0 py-2 d-flex justify-content-between align-items-center {{ request('category_id') == $category->id ? 'fw-bold text-success' : '' }}">
                                    {{ $category->name }}
                                    <i class="fas fa-chevron-right small text-secondary" style="font-size: 0.7rem;"></i>
                                </a>
                            @endforeach
                        </div>

                        <h5 class="fw-bold mt-4 mb-3 border-bottom pb-2 text-uppercase" style="font-size: 1rem;">Khoảng giá
                        </h5>
                        <div class="price-filter">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="p1">
                                <label class="form-check-label" for="p1">Dưới 200.000đ</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="p2">
                                <label class="form-check-label" for="p2">200.000đ - 500.000đ</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="p3">
                                <label class="form-check-label" for="p3">Trên 500.000đ</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                        @foreach ($products as $product)
                            <div class="col">
                                <div class="product-item h-100"> 
                                    @if($product->image)
                                        <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none">
                                            <div class="img-wrapper rounded-4 shadow-sm overflow-hidden" style="height: 220px;">
                                                <img src="{{ asset('storage/' . $product->image) }}" class="w-100 h-100"
                                                    style="object-fit: cover; transition: 0.3s;">
                                            </div>
                                        </a>
                                    @endif

                                    <div class="card-body pt-3 text-start">
                                        <a href="{{ route('product.show', $product->id) }}"
                                            class="text-decoration-none text-dark">
                                            <h6 class="text-title mt-1 fw-bold"
                                                style=" -webkit-box-orient: vertical; overflow: hidden; font-size: 0.9rem;">
                                                {{ $product->name }}
                                            </h6>
                                        </a>
                                        <div class="price-wrapper">
                                            <span class="text-danger fw-bold">{{ number_format($product->variant->min('sale'), 0, ',', '.') }}đ</span>
                                            <span class="text-secondary text-decoration-line-through small ms-2">{{ number_format($product->variant->max('price'), 0, ',', '.') }}đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection