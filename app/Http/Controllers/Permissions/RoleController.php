<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Models\Permissions\ModuleMethod;
use App\Models\Permissions\RoleMethod;
use App\Models\Permissions\UserActivity;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /** role **/
    public function index()
    {
        $roles = Role::orderBy('id')->get();
        return view('dashboard.pages.roles.list', compact('roles'));
    }

    public function roleEdit(Request $request)
    {
        if ($request->input('id')) {
            $model = Role::find($request->input('id'));
            $model = $this->updateRole($request, $model);
//            UserActivity::store("Rol tahrirnlandi", $model);
        } else {
            $model = new Role();
            $model = $this->addRole($request, $model);
//            UserActivity::store("Rol qo'shildi", $model);
        }
        return back()->withSuccess(__("messages.Data_updated"));
    }

    protected function updateRole($request, $model)
    {
        $request->validate($request->all(), [
            'name' => 'required'
        ]);
        $model->name = $request->name;
        $model->save();
        if ($model->admin_access != 1) {
            $data = RoleMethod::where('role_id', $model->id)->get();
            foreach ($data as $row) {
                $row->value = 0;
            }
            $data = $data->toArray();
            RoleMethod::upsert($data, ['id'], ['value']);
            return $model;
        }
    }

    protected function addRole($request, $model)
    {
        $request->validate($request->all(), [
            'name' => 'required'
        ]);
        $model->name = $request->name;
        $model->save();
        $methods = ModuleMethod::all();
        $data = [];
        foreach ($methods as $el) {
            $data[] = [
                'role_id' => $model->id,
                'method_id' => $el->id,
                'value' => 1
            ];
        }
        RoleMethod::insert($data);
        return $model;
    }
    /** end role **/
}
