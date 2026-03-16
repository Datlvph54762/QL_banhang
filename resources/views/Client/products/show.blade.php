@extends('client.layout.app')

@section('title', 'Detail product')

@section('content')
    <div class="container">
        <div class="link-title d-flex mx-5 pt-4 px-4">
            <a href="{{ route('client.home') }}" class="text-decoration-none text-dark link-success ">
                <p>Trang chủ ></p>
            </a>
            <a href="{{ route('client.products.index') }}" class="text-decoration-none text-dark link-success">
                <p class="ms-2"> Sản phẩm  > </p>
            </a>
            <a href="" class="text-decoration-none text-success fw-bold">
                <p class="ms-2"> Show </p>
            </a>
        </div>

        <div class="content">
            <div class="content-title d-flex mx-5 px-4">
                <div class="image-product col-7">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="anh" class="w-100 pe-4" height="600">
                </div>
                <div class="title-product col-5">
                    <h3>{{ $product->name }}</h3>
                    <p class="text-secondary">Mã sản phẩm: {{ $product->product_code }}</p>
                    <div class="price-sale d-flex">
                        <h2 class="text-danger">{{ number_format($product->Variant->min('sale')) }}đ</h2>
                        @if($product->Variant->first()->price)
                            <del class="ms-3 fs-5">{{ number_format($product->Variant->max('price')) }}đ</del>
                        @endif
                    </div>

                    <div class="attributes">
                        <p class="fw-bold mb-2">Màu sắc:</p>
                        <div class="d-flex gap-2 mb-3">
                            @foreach($product->variant as $variant)
                                <button class="btn btn-outline-dark btn-sm shadow-sm link-bold-hover">
                                    {{ $variant->color->name }}
                                </button>
                            @endforeach
                        </div>

                        <p class="fw-bold mb-2">Kích thước:</p>
                        <div class="d-flex gap-2 mb-4">
                            @foreach($product->variant as $variant)
                                <button class="btn btn-outline-secondary btn-sm shadow-sm link-bold-hover">
                                    {{ $variant->size->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="quantity-selector ">
                        <p class="fw-bold">Số lượng:</p>
                        <div class="quantity-input d-flex">
                            <button type="button" class="btn-decrease px-3 border rounded-start text-danger">-</button>
                            <input type="number" class="quantity-input p-2 border text-center" style="width:20%" value="1"
                                min="1">
                            <button type="button" class="btn-increase px-3 border rounded-end text-danger">+</button>
                        </div>
                    </div>

                    <div class="button-sub pt-4">
                        <div class="btn-mua ">
                            <button type="button" class="btn btn-lg w-100 text-white fw-bold">Mua ngay</button>
                        </div>
                        <div class="btn-card mt-3">
                            <button type="button" class="btn btn-lg w-100 border  fw-bold">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="content">
            <div class="title text-start ms-3 py-3 pt-5">
                <h4 class="fw-bold text-dark">Sản phẩm liên quan</h4>
            </div>
            <div class="container">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                    @foreach ($product->related_products as $related)
                        <div class="col">
                            <div class="cards">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" class="card-img-top shadow rounded-4"
                                        height="250">
                                @endif
                                <div class="card-body text-start">
                                    <a href="{{ route('product.show', $related->id)  }}" class="text-decoration-none ">
                                        <h6 class="text-title mt-3 ">{{ $related->name }}</h6>
                                    </a>
                                </div>
                                <span class="text-danger">{{ number_format($related->Variant->min('sale'), 0, ',', '.') }}đ</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection