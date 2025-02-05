<?php

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Support\Facades\DB;

if (!function_exists('loadMenus')) {
    function loadMenus($is_show = "")
    {
        return Menu::get_menu($is_show);
    }
}

if (!function_exists('loadSubMenus')) {
    function loadSubMenus(int $menu_id, $is_show = "")
    {
        return SubMenu::get_submenu_by_menu($menu_id, $is_show);
    }
}

if (!function_exists('loadPermissionByUrl')) {
    function loadPermissionByUrl(string $url, $length = 0)
    {
        return DB::table("permissions")
            ->select("name")
            ->whereRaw("LEFT(name, '$length')='$url'")
            ->get();
    }
}

function requiredFieldLabel($label)
{
    return $label . ' <span style="color: red;">*</span>';
}
