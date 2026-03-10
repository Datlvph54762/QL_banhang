@extends('client.layout.app')

@section('title', 'Trang chủ')

@section('banner')
    <div class="banner">
        <img src="https://badass.vn/wp-content/uploads/2025/03/BANNER-WEB-1350X490.jpg" width="100%" alt="">
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="content">
            <div class="title text-center py-3">
                <h3 class="fw-bold text-danger">Sản phẩm Nổi bật</h3>
            </div>
            <div class="container">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="cards">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top shadow rounded-4"
                                        height="250">
                                @endif
                                <div class="card-body text-start">
                                    <a href="" class="text-decoration-none ">
                                        <h6 class="text-title mt-3 ">{{ $product->name }}</h6>
                                    </a>
                                    <span class="text-danger">{{ number_format($product->sale, 0, ',', '.') }}đ</span>
                                    <span
                                        class="text-secondary text-decoration-line-through ms-2">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection