<?php

namespace Modules\Manufacturingmanagement\Http\Controllers;

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
                'name' => 'Manufacturingmanagement_module',
                'label' => __('Manufacturingmanagement::lang.Manufacturingmanagement_module'),
                'default' => false,
            ],
        ];
    }

    /**
     * Adds Manufacturingmanagement menus
     *
     * @return null
     */
    public function modifyAdminMenu()
    {
        $business_id = session()->get('user.business_id');
        $module_util = new ModuleUtil();

        $is_Manufacturingmanagement_enabled = (bool) $module_util->hasThePermissionInSubscription($business_id, 'Manufacturingmanagement_module');

        $commonUtil = new Util();
        $is_admin = $commonUtil->is_admin(auth()->user(), $business_id);

        if ($is_Manufacturingmanagement_enabled) {
            $menu = Menu::instance('admin-sidebar-menu');
            $menu->url(action([\Modules\Manufacturingmanagement\Http\Controllers\ManufacturingmanagementController::class, 'dashboard']), __('Manufacturingmanagement::lang.Manufacturingmanagement_module'), ['icon' => 'fa fas fa-warehouse', 'active' => request()->segment(1) == 'Manufacturingmanagement'])->order(70);
        }
    }
}
