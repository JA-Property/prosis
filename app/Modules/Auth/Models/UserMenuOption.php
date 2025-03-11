<?php

namespace App\Modules\Auth\Models;


use Illuminate\Database\Eloquent\Model;

class UserMenuOption extends Model
{
    protected $table = 'user_menu_options';
    public $timestamps = false;
    
    // Possibly define relationships:
    public function menuOption()
    {
        return $this->belongsTo(MenuOption::class, 'menu_option_id');
    }
}
