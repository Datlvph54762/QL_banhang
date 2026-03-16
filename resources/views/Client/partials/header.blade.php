<div class="header d-flex align-items-center justify-content-between bg-success py-5">
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

    <div class="col-3 text-start fs-5">
        <a href=""><i class="fa-solid fa-bag-shopping px-3 text-white"></i></a>
        <a href="{{ Route('client.login') }}"><i class="fa-regular fa-user text-white"></i></a>
        <a href=""><i class="fas fa-sign-out-alt ps-3 text-white"></i></a>
    </div>
</div>