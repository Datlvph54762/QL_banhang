@extends('admin.layout.app')

@section('title', 'Danh sách staff')
@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Danh sách Staffs</h5>
            <a href="{{ route('admin.accounts.staffs.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Thêm
                mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Password</th>
                            <th scope="col">Adrress</th>
                            <th scope="col">status</th>
                            <th scope="col" class="text-end">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                            <tr>
                                <td>{{ $staff->id }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>{{ $staff->phone }}</td>
                                <td>
                                    {{ Str::limit($staff->password, 25, '...') }}
                                </td>
                                <td>
                                    {{ $staff->address }}
                                </td>
                                <td>
                                    @if($staff->status)
                                        <span class="badge bg-success">On</span>
                                    @else
                                        <span class="badge bg-danger">Off</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href=""
                                        class="btn btn-sm btn-outline-success" title="show">
                                        <i class="fas fa-eye"></i></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection