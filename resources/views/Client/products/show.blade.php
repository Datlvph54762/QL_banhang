@extends('client.layout.app')

@section('title', 'Detail product')

@section('content')
    <div class="container">
        <div class="link-title d-flex mx-5 pt-4 px-4">
            <a href="{{ route('client.home') }}" class="text-decoration-none text-dark link-success ">
                <p>Trang chủ ></p>
            </a>
            <a href="{{ route('client.products.index') }}" class="text-decoration-none text-dark link-success">
                <p class="ms-2"> Sản phẩm > </p>
            </a>
            <a href="" class="text-decoration-none text-success fw-bold">
                <p class="ms-2"> Show </p>
            </a>
        </div>

        <div class="content">
            <div class="content-title d-flex mx-5 px-4">
                <div class="image-product col-7">
                    <img id="main-image" src="{{ asset('storage/' . $product->image) }}" alt="anh" class="w-100 pe-4" height="600">
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
                            @foreach($product->variant->unique('color_id') as $variant)
                                <label class="color-item" title="{{ $variant->color->name }}">
                                    <input type="radio" name="color_id" value="{{ $variant->color_id }}"
                                        class="d-none color-input">
                                    <span class="color-circle" style="--bg-color: {{ $variant->color->color_code ?? '#eee' }}; background-color: var(--bg-color);"></span>
                                </label>
                            @endforeach
                        </div>

                        <p class="fw-bold mb-2">Kích thước:</p>
                        <div class="d-flex gap-2 flex-wrap mb-4">
                            @foreach($product->variant->unique('size_id') as $variant)
                                <input type="radio" class="btn-check" name="size_id" id="size-{{ $variant->size_id }}"
                                    value="{{ $variant->size_id }}" autocomplete="off">
                                <label class="btn btn-outline-dark btn-sm shadow-sm px-3 py-2"
                                    for="size-{{ $variant->size_id }}">
                                    {{ $variant->size->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <p class="fw-bold">Số lượng:
                        <span id="stock-display" class="text-secondary fw-normal ms-2" style="font-size: 0.9rem;">
                            (Vui lòng chọn màu và kích thước)
                        </span>
                    </p>

                    <div class="quantity-input d-flex">
                        <button type="button" id="btn-decrease" class="px-3 border rounded-start text-danger">-</button>
                        <input type="number" id="buy-quantity" class="p-2 border text-center" style="width:20%" value="1" min="1" readonly>
                        <button type="button" id="btn-increase" class="px-3 border rounded-end text-danger">+</button>
                    </div>

                    <small id="quantity-error" class="text-danger d-block mt-1"></small>

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
                                <span
                                    class="text-danger">{{ number_format($related->Variant->min('sale'), 0, ',', '.') }}đ</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const variants = JSON.parse('{!! json_encode($product->variant) !!}');
        const storagePath = "{{ asset('storage/') }}/";
        
        const colorInputs = document.querySelectorAll('.color-input');
        const sizeInputs = document.querySelectorAll('.btn-check');
        const mainImage = document.getElementById('main-image');

        const stockDisplay = document.getElementById('stock-display');
        const buyQuantityInput = document.getElementById('buy-quantity');
        const btnDecrease = document.getElementById('btn-decrease');
        const btnIncrease = document.getElementById('btn-increase');

        const quantityError = document.getElementById('quantity-error');

        let currentMaxStock = 0;

        function updateVariantInfo() {
            const selectedColor = document.querySelector('.color-input:checked');
            let selectedSize = document.querySelector('.btn-check:checked');

            // --- LOGIC LỌC SIZE (KHÔNG CẦN SỬA HTML) ---
            if (selectedColor) {
                const selectedColorId = selectedColor.value;

                // Tìm các Size ID hợp lệ cho Màu này
                const availableSizeIds = variants
                    .filter(v => v.color_id == selectedColorId && v.quantity > 0)
                    .map(v => v.size_id.toString());

                sizeInputs.forEach(input => {
                    // Tui dùng nextElementSibling vì trong HTML của ông 
                    // thẻ <label> nằm ngay sau thẻ <input> của Size
                    const label = input.nextElementSibling;

                    if (availableSizeIds.includes(input.value)) {
                        input.disabled = false;
                        if (label) {
                            label.style.display = "inline-block";
                            label.style.opacity = "1";
                        }
                    } else {
                        input.disabled = true;
                        if (input.checked) input.checked = false;
                        if (label) {
                            label.style.display = "none"; // Ẩn đi cho chuyên nghiệp
                        }
                    }
                });
            }

            // Cập nhật lại biến selectedSize sau khi lọc
            selectedSize = document.querySelector('.btn-check:checked');
            buyQuantityInput.value = 1;
            quantityError.innerText = "";

            // --- LOGIC HIỂN THỊ ẢNH & KHO ---
            if (selectedColor && selectedSize) {
                const variant = variants.find(v =>
                    v.color_id == selectedColor.value && v.size_id == selectedSize.value
                );

                if (variant) {
                    currentMaxStock = variant.quantity;
                    stockDisplay.innerText = `(Còn ${currentMaxStock} sản phẩm)`;
                    stockDisplay.style.color = "green";
                    if (variant.image) mainImage.src = storagePath + variant.image;
                }
            } else if (selectedColor) {
                const colorVariants = variants.filter(v => v.color_id == selectedColor.value);
                const totalStock = colorVariants.reduce((sum, v) => sum + v.quantity, 0);
                currentMaxStock = totalStock;

                stockDisplay.innerText = `(Vui lòng chọn size - Tổng kho: ${totalStock})`;
                stockDisplay.style.color = "gray";

                const firstImg = colorVariants.find(v => v.image);
                if (firstImg) mainImage.src = storagePath + firstImg.image;
            }
        }

        // Logic Tăng (+) và Giảm (-) giữ nguyên
        btnIncrease.addEventListener('click', function () {
            if (!document.querySelector('.color-input:checked') || !document.querySelector('.btn-check:checked')) {
                quantityError.innerText = "Vui lòng chọn Màu và Size!";
                return;
            }
            let currentQty = parseInt(buyQuantityInput.value);
            if (currentQty < currentMaxStock) {
                buyQuantityInput.value = currentQty + 1;
            } else {
                quantityError.innerText = "Hết kho rồi ông giáo ạ!";
            }
        });

        btnDecrease.addEventListener('click', function () {
            let currentQty = parseInt(buyQuantityInput.value);
            if (currentQty > 1) buyQuantityInput.value = currentQty - 1;
        });

        colorInputs.forEach(input => input.addEventListener('change', updateVariantInfo));
        sizeInputs.forEach(input => input.addEventListener('change', updateVariantInfo));
    });
</script>