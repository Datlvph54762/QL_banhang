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
        <div class="content pb-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="cards">
                            @if($product->image)
                                <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none"><img
                                        src="{{ asset('storage/' . $product->image) }}" class="card-img-top shadow rounded-4"
                                        height="250"></a>
                            @endif
                            <div class="card-body text-start">
                                <a href="{{ route('product.show', $product->id)  }}" class="text-decoration-none ">
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
@endsection