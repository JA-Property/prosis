<?php
namespace App\Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class MenuOption extends Model
{
    protected $table = 'menu_options'; // or whatever your table name is

    public $timestamps = false;

    public function children()
    {
        return $this->hasMany(MenuOption::class, 'parent_id');
    }
}
