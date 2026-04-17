@extends('admin.layout.app')

@section('content')
    <div class="container text-center mt-5 ">
        <div class="title border rounded-pill p-5 shadow-sm" >
            <h1>Chào mừng, {{ auth()->guard('admin')->user()->name }}!</h1>
            <p>Bạn đang đăng nhập với quyền
                <b>{{ auth()->guard('admin')->user()->role_id == 1 ? 'Quản trị viên' : 'Nhân viên' }}</b></p>

            <div class="mt-4">
                @if(auth()->guard('admin')->user()->role_id == 1)
                    <div class="d-inline-block m-2">
                        <a href="{{ route('admin.dashboard.index') }}" class="btn btn-primary">
                            <i class="bi bi-speedometer2"></i> Bảng điều khiển
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection