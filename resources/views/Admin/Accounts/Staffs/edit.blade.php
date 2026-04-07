@extends('admin.layout.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Sửa Staff( Nhân viên )</h5>
            <a href="{{ route('admin.accounts.staffs.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.accounts.staffs.update', $user->id) }}" method="POST">
                @csrf
                @method('PUt')

                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên nhân viên"
                        value="{{ $user->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Roles</label>
                    <select name="role_id" id="role_id" class="form-select form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @selected($role->id == $user->role_id)>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="d-flex">
                    <div class="col-6 mb-3 pe-2 ">
                        <label class="form-label fw-bold">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Nhập địa chỉ email"
                            value="{{ $user->email }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 mb-3 ps-2">
                        <label class="form-label fw-bold">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Nhập phone"
                            value="{{ $user->phone }}">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="d-flex">
                    <div class="col-6 mb-3 pe-2">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="**********" value="{{ $user->password }}">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-6 mb-3 ps-2">
                        <label class="form-label fw-bold">Password_confirmation</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Nhập lại mật khẩu"
                            value="{{ $user->password }}">
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ"
                        value="{{ $user->address }}">
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-3">
                    <label class="fw-bold">Trạng thái hoạt động</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="status" id="statusSwitch" 
                            value="1" {{ $staff->status ? 'checked' : '' }}>
                        <label class="form-check-label" for="statusSwitch">
                            Tắt / Bật <small class="text-muted">( Nếu tắt, nhân viên sẽ không thể đăng nhập vào hệ thống )</small>
                        </label>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Lưu sản phẩm
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection