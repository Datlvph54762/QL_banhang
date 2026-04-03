<div class="header d-flex align-items-center justify-content-between bg-success py-4">
    <div class="logo col-3 text-end">
        <h5 class="fs-1 m-0 fw-bold text-white">STYLEHUB</h5>
    </div>

    <form action="{{ route('client.products.index') }}" method="GET" class="d-flex px-4">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control w-100"
            placeholder="Tìm kiếm...">
        <button type="submit" class="btn btn-primary mx-2   ">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <div class="col-3 text-start fs-5 d-flex">
        <a href="{{ route('client.carts.index') }}"><i class="fa-solid fa-bag-shopping px-3 text-white"></i></a>
        @auth
            @if(Auth::guard('web')->check())
                <div class="dropdown">
                    <a class="text-white fs-6 fw-bold mt-1 dropdown-toggle text-decoration-none shadow-none" href="#"
                        role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::guard('web')->user()->name }}
                    </a>

                    {{-- Menu thả xuống --}}
                    <ul class="dropdown-menu dropdown-menu-white shadow" id="userMenu">
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('client.accounts.orders.index') }}">
                                <i class="fas fa-history me-2"></i> Lịch sử đơn hàng
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="fas fa-user-edit me-2"></i> Thông tin cá nhân
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-secondary">
                        </li>
                        <li>
                            {{-- Form Đăng xuất lồng vào menu --}}
                            <form action="{{ route('client.logout') }}" method="POST"
                                onclick="return confirm('Bạn chắc chắn muốn đăng xuất?')" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger py-2">
                                    <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        @endauth

        @guest
            <a href="{{ route('client.login') }}">
                <i class="fa-regular fa-user text-white"></i>
            </a>
        @endguest
    </div>
</div>