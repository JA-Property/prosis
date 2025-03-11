<?php
namespace App\Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // If your table is "users", Eloquent uses that by default.
    // If you have no timestamps, disable them:
    // public $timestamps = false;

    public function menuOptions()
    {
        // 'user_menu_options' is the pivot table name
        // 'user_id' is the foreign key on the pivot referencing users
        // 'menu_option_id' is the foreign key on the pivot referencing menu_options
        return $this->belongsToMany(
            MenuOption::class,
            'user_menu_options',
            'user_id',
            'menu_option_id'
        );
    }
}
