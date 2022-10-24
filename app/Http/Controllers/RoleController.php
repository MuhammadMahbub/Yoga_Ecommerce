<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use App\Models\UserPermission;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:user,read')->only('index');
        $this->middleware('permission:user,create')->only('create');
        $this->middleware('permission:user,edit')->only('details');
    }


    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.users.role_index',compact('roles'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        $role->save();

        return redirect()->route('role.details',$role->id);

        // return back()->with('success','Created successfully');
    }



    public function update(Request $request,$id)
    {
        session()->put('id',$id);
        $request->validate([
            'edit_name' => 'required|unique:roles,name,'.$id,
        ]);

        session()->forget('id');

        $role = Role::find($id);
        $role->name = $request->edit_name;
        $role->slug = Str::slug($request->name);
        $role->save();

        return back()->with('update','Updated successfully');
    }




    public function delete($id)
    {
        $role = Role::find($id);

        $users = User::where('role',$id)->get();
        foreach ($users as $user) {
            $user->role = null;
        }

        $role->delete();

        return back()->with('success', __("Deleted Successfully"));
    }


    public function details($id)
    {
        $role = Role::find($id);

        return view('admin.users.role_details',compact('role'));
    }


    public function permission(Request $request)
    {
        $ex_permission = RolePermission::where('role_id',$request->role_id)->where('model',$request->module_name)->get()->each->delete();
        $role = Role::find($request->role_id);

        if (isset($request->read)) {

            $permission           = new RolePermission();
            $permission->role_id  = $request->role_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'read';
            $permission->save();

            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','read')->first();
                if ($user_permission == null) {
                    $permission_user           = new UserPermission();
                    $permission_user->user_id  = $user->id;
                    $permission_user->model    = $request->module_name;
                    $permission_user->action   = 'read';
                    $permission_user->save();
                }
            }

        }

        else{

            $role_permission = RolePermission::where('role_id',$request->role_id)->where('model',$request->module_name)->where('action','read')->first();
            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','read')->first();
                if ($user_permission != null) {
                    $user_permission->delete();
                }
            }
            if ($role_permission != null) {
                $role_permission->delete();
            }
        }

        if (isset($request->create)) {

            $permission           = new RolePermission();
            $permission->role_id  = $request->role_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'create';
            $permission->save();
            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','create')->first();
                if ($user_permission == null) {
                    $permission_user           = new UserPermission();
                    $permission_user->user_id  = $user->id;
                    $permission_user->model    = $request->module_name;
                    $permission_user->action   = 'create';
                    $permission_user->save();
                }
            }
        }

        else{

            $user_permission = RolePermission::where('role_id',$request->role_id)->where('model',$request->module_name)->where('action','create')->first();
            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','read')->first();
                if ($user_permission != null) {
                    $user_permission->delete();
                }
            }
            if ($user_permission != null) {
                $user_permission->delete();
            }
        }



        if (isset($request->edit)) {

            $permission           = new RolePermission();
            $permission->role_id  = $request->role_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'edit';
            $permission->save();

            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','edit')->first();
                if ($user_permission == null) {
                    $permission_user           = new UserPermission();
                    $permission_user->user_id  = $user->id;
                    $permission_user->model    = $request->module_name;
                    $permission_user->action   = 'edit';
                    $permission_user->save();
                }
            }
        }

        else{

            $user_permission = RolePermission::where('role_id',$request->role_id)->where('model',$request->module_name)->where('action','edit')->first();

            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','edit')->first();
                if ($user_permission != null) {
                    $user_permission->delete();
                }
            }

            if ($user_permission != null) {
                $user_permission->delete();
            }
        }



        if (isset($request->delete)) {

            $permission           = new RolePermission();
            $permission->role_id  = $request->role_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'delete';
            $permission->save();

            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','delete')->first();
                if ($user_permission == null) {
                    $permission_user           = new UserPermission();
                    $permission_user->user_id  = $user->id;
                    $permission_user->model    = $request->module_name;
                    $permission_user->action   = 'delete';
                    $permission_user->save();
                }
            }
        }

        else{

            $user_permission = RolePermission::where('role_id',$request->role_id)->where('model',$request->module_name)->where('action','delete')->first();

            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','delete')->first();
                if ($user_permission != null) {
                    $user_permission->delete();
                }
            }

            if ($user_permission != null) {
                $user_permission->delete();
            }
        }



        if (isset($request->assigne)) {

            $permission           = new RolePermission();
            $permission->role_id  = $request->role_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'assigne';
            $permission->save();

            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','assigne')->first();
                if ($user_permission == null) {
                    $permission_user           = new UserPermission();
                    $permission_user->user_id  = $user->id;
                    $permission_user->model    = $request->module_name;
                    $permission_user->action   = 'assigne';
                    $permission_user->save();
                }
            }
        }

        else{

            $user_permission = RolePermission::where('role_id',$request->role_id)->where('model',$request->module_name)->where('action','assigne')->first();


            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','assigne')->first();
                if ($user_permission != null) {
                    $user_permission->delete();
                }
            }

            if ($user_permission != null) {
                $user_permission->delete();
            }
        }




        if (isset($request->import)) {

            $permission           = new RolePermission();
            $permission->role_id  = $request->role_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'import';
            $permission->save();

            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','import')->first();
                if ($user_permission == null) {
                    $permission_user           = new UserPermission();
                    $permission_user->user_id  = $user->id;
                    $permission_user->model    = $request->module_name;
                    $permission_user->action   = 'import';
                    $permission_user->save();
                }
            }
        }

        else{

            $user_permission = RolePermission::where('role_id',$request->role_id)->where('model',$request->module_name)->where('action','import')->first();


            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','import')->first();
                if ($user_permission != null) {
                    $user_permission->delete();
                }
            }

            if ($user_permission != null) {
                $user_permission->delete();
            }
        }




        if (isset($request->export)) {

            $permission           = new RolePermission();
            $permission->role_id  = $request->role_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'export';
            $permission->save();

            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','export')->first();
                if ($user_permission == null) {
                    $permission_user           = new UserPermission();
                    $permission_user->user_id  = $user->id;
                    $permission_user->model    = $request->module_name;
                    $permission_user->action   = 'export';
                    $permission_user->save();
                }
            }
        }

        else{

            $user_permission = RolePermission::where('role_id',$request->role_id)->where('model',$request->module_name)->where('action','export')->first();

            foreach ($role->getUsers as $user) {
                $user_permission = UserPermission::where('user_id',$user->id)->where('model',$request->module_name)->where('action','export')->first();
                if ($user_permission != null) {
                    $user_permission->delete();
                }
            }

            if ($user_permission != null) {
                $user_permission->delete();
            }
        }

        return  response(__('User Action Updated'));
    }
}
