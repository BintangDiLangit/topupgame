<?php 

namespace App\Helpers\Admin\Users;

use App\Models\Role;

class RoleHelper{
    public function listAllRole()
    {
        try {
            $roles = Role::orderBy('created_at','desc')->get();
            return $roles;
        } catch (\Throwable $th) {
            return [
                'status' => 200,
                'message' => $th->getMessage()
            ];
        }
    }

    public function addRole($data)
    {
        try {
            $role = Role::create([
                'nama_role' => $data['nama_role'],
            ]);
            return $role;
        } catch (\Throwable $th) {
            return [
                'status' => 200,
                'message' => $th->getMessage()
            ];
        }
    }


}