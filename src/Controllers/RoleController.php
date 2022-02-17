<?php

namespace JoulesLabs\IllumineAdmin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Nahid\Permit\Facades\Permit;
use Nahid\Permit\Roles\Role;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(): View
    {
        auth_admin()->allows('role.list'); //auth_admin()->allows(['customer.list' => [$id]]); for passing id, we can pass multiple params

        $roles = Role::paginate(20);

        return view('admin.roles.index', compact('roles'));
    }

    public function create(): View
    {
        auth_admin()->allows('role.create');

        $abilities = Permit::getAbilities();

        return view('admin.roles.create', compact('abilities'));
    }

    public function store(Request $request): RedirectResponse
    {
        auth_admin()->allows('role.create');

        $this->validate($request, [
            'role_name' => ['required'],
            'permissions' => ['required', 'array']
        ]);

        if (auth_admin()->canDo('user.store')) {
            $this->validate($request, [
                'role_name' => ['required']
            ]);
        }

        $data['role_name'] = $request->input('role_name');
        $data['permission'] = $request->input('permissions', []);

        $role = new Role();
        $role->fill($data);

        if (!$role->save()) {
            return redirect()->back()->with(['_status' => 'error', '_msg' => 'Unable to save the data!']);
        }

        return redirect()->back()->with(['_status' => 'success', '_msg' => 'Successfully created role!']);
    }


    public function edit(string $id): View
    {
        auth_admin()->allows('role.update');

        $role = Role::findOrFail((int) $id);
        $abilities = Permit::getAbilities();

        return view('admin.roles.edit', compact('role', 'abilities'));
    }


    public function update(string $id, Request $request): RedirectResponse
    {
        auth_admin()->allows('role.update');

        $this->validate($request, [
            'role_name' => ['required'],
            'permissions' => ['required', 'array']
        ]);

        $role = Role::findOrFail((int) $id);

        $data['role_name'] = $request->input('role_name');
        $data['permission'] = $request->input('permissions', []);

        $role->fill($data);

        if (!$role->save()) {
            return redirect()->back()->with(['_status' => 'error', '_msg' => 'Unable to save the data!']);
        }

        return redirect()->back()->with(['_status' => 'success', '_msg' => 'Successfully updated role!']);
    }
}
