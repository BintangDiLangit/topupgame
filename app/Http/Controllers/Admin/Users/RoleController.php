<?php

namespace App\Http\Controllers\Admin\Users;

use App\Helpers\Admin\Users\RoleHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = new RoleHelper();
        $roles = $roles->listAllRole();

        return view('admin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|max:255',
        ]);
        
        $user = new RoleHelper();
        $user->addRole($request->all());
        return redirect()->back();
    }

}
