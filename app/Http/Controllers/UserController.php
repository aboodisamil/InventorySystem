<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::WhereUserNot(['super_Admin' , auth()->user()->name])->WhenSearch(request()->search)->WhenRoleSearch(request()->role)->with('roles')->paginate(10);
        $roles=Role::whereRoleNot(['super_admin'])->get();

        return view('dashboard.user.index', compact('users' , 'roles'));
    }


    public function create()
    {
        $roles = Role::whereRoleNot(['super_admin', 'admin'])->get();
        return view('dashboard.user.create', compact('roles'));
    }


    public function store(UserRequest $request)
    {
        try
        {
            $user = User::create([
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password)
            ]);
            $user->attachRoles(['admin', $request->role]);
            session()->flash('success', 'تم اضافة معلومات المستخدم بنجاح');

            return redirect()->route('dashboard.user.index');


        } catch (\Exception $exception)
        {
            session()->flash('success','تأكد من المعلومات المدخلة');
            return redirect()->back();
        }

    }



    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::whereRoleNot(['super_admin', 'admin'])->select('name')->get();
        return view('dashboard.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        try
        {
            $user->update([
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password)
            ]);
            $user->syncRoles(['admin' ,$request->role]);
            session()->flash('success', 'تم تعديل معلومات المستخدم بنجاح');
        }
        catch (\Exception $exception)
        {
            session()->flash('success','تأكد من المعلومات المدخلة');
            return redirect()->back();
        }

       return redirect()->route('dashboard.user.index');

    }

    public function destroy(User $user)
    {
        $user->roles()->detach();

        $user->delete();

        session()->flash('success', 'تم حذف معلومات المستخدم بنجاح');

        return redirect()->back();
    }
}
