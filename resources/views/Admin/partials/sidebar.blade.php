<div id="sidebar-wrapper" class="bg-light" style="width: 18%;">
    <div class="sidebar-heading p-3 fs-4 text-body fw-bold "><i class="fas fa-user-shield text-primary"></i>
        Adminator</div>
    <div class="nav flex-column py-3  ">
        <a href="#" class="nav-link text-muted fw-bold  "><i class="fas fa-tachometer-alt"></i> Dashboard</a>

        <a href="{{ route('admin.categories.index') }}" class="nav-link text-muted fw-bold"><i class="fas fa-box"></i>
            Quản lý Danh mục</a>

        <a href="{{ route('admin.products.index') }}" class="nav-link text-muted fw-bold"><i class="fas fa-box"></i>
            Quản lý Sản phẩm</a>

        <a href="{{ route('admin.orders.index') }}" class="nav-link text-muted fw-bold"><i
                class="fas fa-shopping-cart"></i> Đơn hàng</a>

        <div class="nav-item border-bottom pb-2">
            <a class="nav-link text-muted fw-bold d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" href="#accountSubmenu" role="button" aria-expanded="false">
                <span><i class="fas fa-users-cog"></i> Quản lý Tài khoản <i class="fas fa-chevron-down small"></i></span>
                
            </a>

            <div class="collapse ps-3 pb-2" id="accountSubmenu">
                <a href="{{ route('admin.accounts.users.index') }}" class="nav-link text-muted py-1 fw-bold small py-3">
                    <i class="fas fa-user"></i> Khách hàng
                </a>
                <a href="" class="nav-link text-muted py-1 fw-bold small py-3">
                    <i class="fas fa-user-tie"></i> Nhân viên (Staff)
                </a>
                <a href="" class="nav-link text-muted py-1 fw-bold small py-3">
                    <i class="fas fa-key"></i> Phân quyền
                </a>
            </div>
        </div>
        <a href="#" class="nav-link text-muted fw-bold mt-auto border-0"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
    </div>
</div>