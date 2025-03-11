<?php
namespace App\Modules\Auth\Models;
class User
{
    public function menuOptions()
    {
        return $this->belongsToMany(
            \App\Modules\Auth\Models\MenuOption::class,
            'user_menu_options',        // pivot table
            'user_id',                  // foreign key on pivot (user)
            'menu_option_id'            // foreign key on pivot (menu_option)
        );
    }
    
}
