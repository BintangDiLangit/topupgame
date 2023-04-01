<?php

namespace App\Http\Controllers\Admin\Users;

use App\Helpers\Admin\Users\RoleHelper;
use App\Helpers\Admin\Users\UserHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $roles = new RoleHelper();
        $roles = $roles->listAllRole();

        $users = new UserHelper();
        $users = $users->listAllUser();

        return view('admin.users.index', compact('users','roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'name' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
        
        $user = new UserHelper();
        $user->addUser($request->all());
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'email' => 'required|string',
            'name' => 'required|max:255',
            'password' => 'nullable|min:8',
        ]);

        $user = new UserHelper();
        $user->updateUser($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = new UserHelper();
        $user->deleteUser($id);
        return redirect()->back();
    }
}
