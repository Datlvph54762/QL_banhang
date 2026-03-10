@extends('client.layout.app')

@section('title', 'Trang chủ')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title text-center py-3">
                <h3 class="fw-bold text-danger">Sản phẩm Nổi bật</h3>
            </div>
            <div class="container">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                    <div class="col">
                        <div class="cards">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQf-Adp1Cnvcly1lb9E3_9x0iMdWeqnxa2nUA&s"
                                class="card-img-top rounded-4">
                            <div class="card-body text-start">
                                <a href="" class="text-decoration-none ">
                                    <h6 class="text-title mt-3 ">Product 2</h6>
                                </a>
                                <span class="text-danger">199.000đ</span>
                                <span class="text-secondary text-decoration-line-through ms-2">300.000đ</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection