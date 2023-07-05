<?php

namespace Database\Seeders;

use App\Models\Permissions\ModuleMethod;
use App\Models\Permissions\RoleMethod;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ModuleMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        $data = [];
        foreach (Route::getRoutes()->getRoutes() as $route) {
//      if (strpos($action, 'Admin') !== false) {
            if (in_array('custom', $route->middleware()) && str_contains($route->getActionName(), '@')) {
                $action = $route->getActionName();
                $action = explode('\\', $action);
                $method = end($action);
//            if ($method != 'IndexController@bad') {
                $action = explode('@', $method);
                $module = $action[0];
                $title = end($action);
                $data[] = [
                    'module' => $module,
                    'method' => $method,
                    'title' => $title,
                    'number' => ++$i
                ];
            }
        }
//        }
//    }

        // yangi methodlarni qo'wiw start
        foreach ($data as $el) {
            if (!(ModuleMethod::where('method', $el['method']))->exists()) {
                ModuleMethod::create($el);
            }
        }
        // yangi methodlarni qo'wiw end
        $data = collect($data);
        // O'chirilgan methodlarni tozalash start
        $temp = $data->pluck('method');
        DB::table('module_methods')->whereNotIn('method', $temp)->delete();
        // O'chirilgan methodlarni tozalash end


        $data = ModuleMethod::all();
        // Methodlarni rollarga biriktirish
        if (!empty($data)) {
            $roles = Role::all();
            foreach ($data as $el) {
                foreach ($roles as $role) {
                    if (!(RoleMethod::where('role_id', $role->id)->where('method_id', $el->id)->first())) {
                        RoleMethod::create(
                            [
                                'role_id' => $role->id,
                                'method_id' => $el->id,
                                'value' => 1
                            ]
                        );
                    }
                }
            }
        }
    }
}
