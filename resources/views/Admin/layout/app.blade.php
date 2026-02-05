<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            overflow-x: hidden;
            background: #f8f9fa;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            background: #343a40;
            transition: all 0.3s;
        }

        #sidebar-wrapper .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 15px 20px;
        }

        #sidebar-wrapper .nav-link:hover {
            background: #aabfd4;
            color: #fff;
        }

        #sidebar-wrapper .nav-link i {
            width: 30px;
        }

        #sidebar-wrapper .active {
            background: #0d6efd !important;
            color: #fff !important;
        }

        .navbar {
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div id="sidebar-wrapper" class="bg-light">
            <div class="sidebar-heading p-3 fs-4 text-body fw-bold "><i class="fas fa-user-shield text-primary"></i>
                Adminator</div>
            <div class="nav flex-column py-3  ">
                <a href="#" class="nav-link text-muted fw-bold  "><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#" class="nav-link text-muted fw-bold"><i class="fas fa-box"></i> Quản lý Danh mục</a>
                <a href="#" class="nav-link text-muted fw-bold"><i class="fas fa-box"></i> Quản lý Sản phẩm</a>
                <a href="#" class="nav-link text-muted fw-bold"><i class="fas fa-shopping-cart"></i> Đơn hàng</a>
                <!-- <a href="#" class="nav-link text-muted fw-bold"><i class="fas fa-chart-bar"></i> Báo cáo doanh thu</a> -->
                <a href="#" class="nav-link text-muted fw-bold"><i class="fas fa-users"></i> Quản lý User</a>
                <a href="#" class="nav-link text-muted fw-bold mt-auto border-0"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
            </div>
        </div>

        <div id="page-content-wrapper" class="w-100 bg-secondary">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-2">
                <div class="container-fluid">
                    <button class="btn btn-outline-secondary btn-sm" id="menu-toggle"><i
                            class="fas fa-bars"></i></button>
                    <div class="input-search col-3 d-flex px-4 gap-2">
                        <input type="" class="form-control">
                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>

                    </div>

                    <div class="ms-auto d-flex align-items-center">

                        <div class="me-3 mt-1"><i class="far fa-bell fs-5 text-muted"></i></div>
                        <img src="https://tse4.mm.bing.net/th/id/OIP.ZPuMm81FSMbBbt-Xaa3aQAHaHa?pid=Api&P=0&h=180"
                            style="width: 40px; height: 40px;" class="rounded-circle me-2">
                        <span class="fw-bold">John Doe</span>
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-4 ">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 fw-bold text-primary">Danh sách Sản phẩm</h5>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Thêm mới</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Danh mục sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col" class="text-end">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="https://via.placeholder.com/50" class="rounded shadow-sm"
                                                alt="product">
                                        </td>
                                        <td>
                                            <small class="text-muted">Điện thoại</small>
                                        </td>
                                        <td>
                                            <div class="fw-bold">iPhone 15 Pro Max</div>

                                        </td>
                                        <td><span class="text-danger fw-bold">30.000.000đ</span></td>
                                        <td><span class="badge bg-success">Còn hàng</span></td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-outline-warning" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" title="Xóa"
                                                onclick="return confirm('Bác có chắc muốn xóa không?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>