<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'idMenu';

    protected $fillable = ['namaMenu', 'baseUrl', 'label'];

    public function AksesMenus() {
        return $this->belongsToMany(AksesMenu::class, 'akses_menus_menus', 'idMenu', 'idAksesMenu');
    }
}
