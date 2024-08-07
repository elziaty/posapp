<?php

namespace Modules\WeightedAverage\Http\Controllers;

use App\Utils\ModuleUtil;
use App\Utils\Util;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Menu;

class DataController extends Controller
{
    /**
     * Superadmin package permissions
     *
     * @return array
     */
    public function superadmin_package()
    {
        return [
            [
                'name' => 'WeightedAverage_module',
                'label' => __('WeightedAverage::lang.WeightedAverage_module'),
                'default' => false,
            ],
        ];
    }

    /**
     * Adds WeightedAverage menus
     *
     * @return null
     */
    public function modifyAdminMenu()
    {
        $business_id = session()->get('user.business_id');
        $module_util = new ModuleUtil();

        $is_WeightedAverage_enabled = (bool) $module_util->hasThePermissionInSubscription($business_id, 'WeightedAverage_module');

        $commonUtil = new Util();
        $is_admin = $commonUtil->is_admin(auth()->user(), $business_id);

        if ($is_WeightedAverage_enabled) {
            $menu = Menu::instance('admin-sidebar-menu');
            $menu->url(action([\Modules\WeightedAverage\Http\Controllers\WeightedAverageController::class, 'dashboard']), __('WeightedAverage::lang.WeightedAverage_module'), ['icon' => 'fa fas fa-warehouse', 'active' => request()->segment(1) == 'WeightedAverage'])->order(70);
        }
    }
}
