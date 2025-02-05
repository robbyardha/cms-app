<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    /** @use HasFactory<\Database\Factories\SubMenuFactory> */
    use HasFactory;

    protected $table = "sub_menus";
    protected $guarded = ["id"];
    protected $primaryKey = "id";


    public static function get_submenu_by_menu(int $menu_id, $is_show = "")
    {
        if ($is_show) {
            $query = self::where("is_show", 1)->where("menu_id", $menu_id)->get();
        } else {
            $query = self::where("menu_id", $menu_id)->get();
        }
        return $query;
    }
}
