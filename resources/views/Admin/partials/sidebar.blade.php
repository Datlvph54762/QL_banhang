<div id="sidebar-wrapper" class="bg-light border-end
" style="width: 20%;">
    <div class="sidebar-heading p-3 fs-4 text-body fw-bold "><i class="fas fa-user-shield text-primary"></i>
        Adminator</div>
    <div class="nav flex-column py-3  ">
        @if(auth()->guard('admin')->user()->role_id == 1)
            <a href="{{ route('admin.dashboard.index') }}" class="nav-link text-muted fw-bold">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        @else
            <a href="javascript:void(0)" class="nav-link text-muted fw-bold opacity-50 pe-none" style="cursor: not-allowed;"
                title="Chức năng chỉ dành cho Admin">
                <i class="fas fa-tachometer-alt"></i> Dashboard <i class="fas fa-lock small ms-1"></i>
            </a>
        @endif

        @if(auth()->guard('admin')->user()?->canDo('manage_categories'))
            <a href="{{ route('admin.categories.index') }}" class="nav-link text-muted fw-bold"><i class="fas fa-box"></i>
                Quản lý Danh mục</a>
        @endif

        @if(auth()->guard('admin')->user()?->canDo('view_product'))
            <a href="{{ route('admin.products.index') }}" class="nav-link text-muted fw-bold"><i class="fas fa-box"></i>
                Quản lý Sản phẩm</a>
        @endif

        @if(auth()->guard('admin')->user()?->canDo('view_order'))
            <a href="{{ route('admin.orders.index') }}" class="nav-link text-muted fw-bold"><i
                    class="fas fa-shopping-cart"></i> Đơn hàng</a>
        @endif

        <div class="nav-item border-bottom pb-2">
            @if(auth()->guard('admin')->user()->role_id == 1)
                <a class="nav-link text-muted fw-bold d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" href="#accountSubmenu" role="button" aria-expanded="false">
                    <span><i class="fas fa-users-cog"></i> Quản lý Tài khoản <i
                            class="fas fa-chevron-down small"></i></span>
                </a>

                <div class="collapse ps-3 pb-2" id="accountSubmenu">
                    <a href="{{ route('admin.accounts.users.index') }}" class="nav-link text-muted py-1 fw-bold small py-3">
                        <i class="fas fa-user"></i> Khách hàng
                    </a>
                    <a href="{{ route('admin.accounts.staffs.index') }}"
                        class="nav-link text-muted py-1 fw-bold small py-3">
                        <i class="fas fa-user-tie"></i> Nhân viên (Staff)
                    </a>
                    <a href="{{ route('admin.accounts.roles-permission.index') }}"
                        class="nav-link text-muted py-1 fw-bold small py-3">
                        <i class="fas fa-key"></i> Vai trò phân quyền
                    </a>
                </div>
            @else
                <a class="nav-link text-muted fw-bold d-flex justify-content-between align-items-center opacity-50 pe-none"
                    style="cursor: not-allowed;">
                    <span><i class="fas fa-users-cog"></i> Quản lý Tài khoản <i class="fas fa-lock small ms-1"></i></span>
                </a>
            @endif
        </div>

        <form action="{{ route('logout') }}" method="POST" class="nav-link " onclick="return confirm('Bạn chắc chắn muốn đăng xuất khỏi trang quản trị?')">
            @csrf
            <button type="submit" class="text-muted fw-bold border-0 bg-transparent p-0 shadow-none">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
            </button>
        </form>

        
    </div>
</div>