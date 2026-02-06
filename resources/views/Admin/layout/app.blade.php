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
        @include('admin.partials.sidebar')

        <div id="page-content-wrapper" class="w-100 bg-secondary">
            @include('admin.partials.navbar')

            <div class="container-fluid p-4 ">
                @yield('content')
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>