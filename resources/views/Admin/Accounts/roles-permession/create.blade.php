@extends('admin.layout.app')

@section('title', 'Roles')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Danh sách Quyền hạn của Role</h5>
            <a href="{{ route('admin.accounts.roles-permission.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3 fw-bold">
                    <label>Tên vai trò:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="row mt-4">
                    <span class="fw-bold mb-2">Chọn quyền hạn:</span>
                    @foreach($permissions as $permission)
                        <div class="col-md-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                    value="{{ $permission->id }}" id="perm-{{ $permission->id }}">
                                <label class="form-check-label fw-bold" for="perm-{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Lưu role
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection