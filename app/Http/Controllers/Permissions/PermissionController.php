<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Models\Permissions\ModuleMethod;
use App\Models\Permissions\RoleMethod;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index($name)
    {
        $role = Role::where('name', $name)->first();
        if ($role) {
            //admin_access borligini tekshirish

            $id = $role->id;
            //barcha method larni olish
            $data = ModuleMethod::with(['role_methods' => function ($query) use ($id) {
                $query->where('role_id', $id);
            }])->get()->toArray();
            //module va method larni tree ko'rinishiga keltirish
            foreach ($data as $el) {
                $new_data[$el['module']][] = $el;
                unset($data[$el['id']]);
            }
            $data = $new_data;
            //modullarni ajratib olish
            $modules = array_keys($data);
            return view('dashboard.pages.roles.permission', compact('data', 'id', 'name', 'modules'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request)
    {
        $role_id = $request->role_id;
        $methods = array_keys($request->methods);
        // dd($methods);
        $data = RoleMethod::where('role_id', $role_id)->get();
        foreach ($data as $row) {
            in_array($row->method_id, $methods) ? $row->value = 1 : $row->value = 0;
        }
        $data = $data->toArray();
        RoleMethod::upsert($data, ['id'], ['value']);
        return redirect()->route('role.list');
    }
}
