@extends('admin.layout.app')

@section('title', 'Danh sách users')
@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Danh sách Users</h5>
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
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    {{ Str::limit($user->password, 25, '...') }}
                                </td>
                                <td>
                                    {{ $user->address }}
                                </td>
                                <td>
                                    @if($user->status)
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