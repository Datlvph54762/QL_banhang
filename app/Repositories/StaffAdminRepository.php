<?php

namespace App\Repositories;

use App\Models\User;

class StaffAdminRepository
{
    public function getStaff()
    {
        return User::with('role')->orderBy('id', 'desc')->whereNotIn('role_id', [1,3])->get();
    }

    public function create($data)
    {
        return User::create($data);
    }

    public function findId($id)
    {
        return User::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);

        return $user->update($data);
    }
}