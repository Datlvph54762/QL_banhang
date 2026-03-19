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
                <span class="text-white fs-6 fw-bold mt-1">{{ Auth::guard('web')->user()->name }}</span>
            @endif
            <form action="{{ route('client.logout') }}" method="POST" onclick="return confirm('Bạn chắc chắn muốn đắng xuất?')" class="d-inline">
                @csrf
                <button type="submit" class="p-0 border-0 bg-transparent text-white">
                    <i class="fas fa-sign-out-alt ps-2"></i>
                </button>
            </form>
        @endauth

        @guest
            <a href="{{ route('client.login') }}">
                <i class="fa-regular fa-user text-white"></i>
            </a>
        @endguest
    </div>
</div>