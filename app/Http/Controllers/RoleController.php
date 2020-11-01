<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::whenSearch(request()->search)->WhereRoleNot(['super_admin', 'admin'])->paginate(5);
        return view('dashboard.role.index', compact('roles'));

    }


    public function create()
    {
        return view('dashboard.role.create');
    }


    public function store(RoleRequest $request)
    {
        try
        {
            $role = Role::create([
                'name' => $request->name
            ]);
            $role->attachPermissions($request->permissions);
            session()->flash('success', 'تم اضافة الوظيفة بنجاح');
            return redirect()->route('dashboard.role.index');

        } catch (\Exception $exception)
        {
            session()->flash('success', 'هنالك بعض الأخظاء . تأكد من المعلومات المدخلة');
            return redirect()->route('dashboard.role.index');
        }
    }


    public function show(Role $role)
    {
    }

    public function edit(Role $role)
    {
        $permission=Permission::select('id')->get();
        return view('dashboard.role.edit', compact('role' , 'permission'));
    }

    public function update(RoleRequest $request, Role $role)
    {

        try
        {
            if (!$role)
            {
                session()->flash('success', 'معلومات هذا الصنف غير متوفرة');
                return redirect()->back();
            }
            $role->update([
                'name' => $request->name
            ]);

            $role->syncPermissions($request->permissions);
            session()->flash('success', 'تم تعديل معلومات الوظيفة بنجاح');

            return redirect()->route('dashboard.role.index');

        } catch (\Exception $exception)
        {
            return redirect()->back();
        }
    }

    public function destroy(Role $role)
    {
        if (!$role)
        {
            session()->flash('success', 'معلومات هذا الصنف غير متوفرة');
            return redirect()->back();
        }
        $role->delete();
        $role->users()->delete();
        session()->flash('success', 'تم حذف الوظيفة بنجاح');
        return redirect()->back();
    }
}
