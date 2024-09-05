<?php

namespace Modules\GiftCard\Http\Controllers;

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
                'name' => 'GiftCard_module',
                'label' => __('GiftCard::lang.GiftCard_module'),
                'default' => false,
            ],
        ];
    }

    /**
     * Adds GiftCard menus
     *
     * @return null
     */
    public function modifyAdminMenu()
    {
        $business_id = session()->get('user.business_id');
        $module_util = new ModuleUtil();

        $is_GiftCard_enabled = (bool) $module_util->hasThePermissionInSubscription($business_id, 'GiftCard_module');

        $commonUtil = new Util();
        $is_admin = $commonUtil->is_admin(auth()->user(), $business_id);

        if ($is_GiftCard_enabled) {
            $menu = Menu::instance('admin-sidebar-menu');
            $menu->url(action([\Modules\GiftCard\Http\Controllers\GiftCardController::class, 'dashboard']), __('GiftCard::lang.GiftCard_module'), ['icon' => 'fa fas fa-warehouse', 'active' => request()->segment(1) == 'GiftCard'])->order(70);
        }
    }
}
