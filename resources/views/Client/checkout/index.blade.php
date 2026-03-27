@extends('client.layout.app')

@section('content')
    <div class="container">
        <div class="link-title d-flex mx-5 pt-4 px-4">
            <a href="{{ route('client.home') }}" class="text-decoration-none text-dark link-success ">
                <p>Trang chủ ></p>
            </a>
            <a href="{{ route('client.carts.index') }}" class="text-decoration-none ms-2 text-dark link-success ">
                <p>Giỏ hàng ></p>
            </a>
            <a href="" class="text-decoration-none text-success fw-bold">
                <p class="ms-2">Thanh toán</p>
            </a>
        </div>
        <div class="row">
            <div class="col-sm-6 px-4 py-2">
                <h4 class="my-3 fw-bold">Thông tin nhận hàng</h4>
                <div class="form-group">
                    <input type="text" class="form-control mb-3" placeholder="Họ tên">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control mb-3" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control mb-3" placeholder="Địa chỉ">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control mb-3" placeholder="Ghi chú">
                </div>

                <div class="method-payment border rounded-pill">
                    <div class="title p-3 ms-2  ">
                        <h5 class="fw-bold">Phương thức thanh toán</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkChecked">
                            <label class="form-check-label" for="checkChecked">
                                Thanh toán khi nhận hàng
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 p-3 my-2 py-5">
                <div class="cart-view border rounded py-4 px-5    ">
                    <h4 class="border-bottom pb-2 fw-bold">Tóm tắt đơn hàng</h4>
                    <div class="total d-flex justify-content-between">
                        <p>Số lượng sản phẩm</p>
                        <p id="total_quantity">3</p>
                    </div>
                    <div class="total d-flex justify-content-between">
                        <p>Tổng tiền hàng</p>
                        <p id="total_amount" class="text-danger"> 520.000 đ</p>
                    </div>
                    <div class="total d-flex justify-content-between">
                        <p>Phí vận chuyển</p>
                        <p>30.000 đ</p>
                    </div>
                    <div class="total d-flex justify-content-between">
                        <p class="fw-bold">Tổng thanh toán</p>
                        <p><b id="final_amount" class="text-danger fw-bold">550.000 đ</b></p>
                    </div>

                    <div class="button mt-2 text-end">
                        <button type="submit" class="btn btn-success">Hoàn thành</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="show-products">
            <div class="view-more-product">
                <span class="btn btn-secondary text-white" data-bs-toggle="collapse" data-bs-target="#displayProducts">
                    Hiển thị sản phẩm</span>
            </div>
            <div class="checkout-my-cart collapse" id="displayProducts">
                <div class="cart-list">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="image-product d-flex">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTrI-pGHM28O601EwtBOv7LRTj07iGnxVBGw&s" alt="ảnh" width="100" height="100">
                                        <div class="product ms-2">
                                            <p>Sản phẩm</p>
                                            <p>Color:...., Size: ....</p>
                                        </div>
                                    </div>
                                </td>
                                <td>300.000đ</td>
                                <td>6</td>
                                <td>1.800.000 đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection