<?php 

namespace App\Helpers\Admin\Users;

use App\Models\User;

class UserHelper{
    public function listAllUser()
    {
        try {
            $users = User::orderBy('created_at','desc')->get();
            return $users;
        } catch (\Throwable $th) {
            return [
                'status' => 200,
                'message' => $th->getMessage()
            ];
        }
    }
    public function addUser($data)
    {
        try {
            $users = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role_id' => $data['role_id'],
                'status' => $data['status'],
            ]);
            return $users;
        } catch (\Throwable $th) {
            return [
                'status' => 200,
                'message' => $th->getMessage()
            ];
        }
    }
    public function updateUser($data, $id)
    {
        try {
            $user = User::find($id);
            if (isset($user)) {
                $user->name = $data['name'];
                $user->email = $data['email'];
                if (isset($data['password'])) {
                    $user->password = bcrypt($data['password']);
                }
                $user->role_id = $data['role_id'];
                $user->status = $data['status'];
                $user->save();
                return $user;
            }
        } catch (\Throwable $th) {
            return [
                'status' => 200,
                'message' => $th->getMessage()
            ];
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::find($id);
            if (isset($user) && $user->delete()) {
                return true;
            }
        } catch (\Throwable $th) {
            return [
                'status' => 200,
                'message' => $th->getMessage()
            ];
        }
    }


}