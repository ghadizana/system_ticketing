<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesMenu extends Model
{
    use HasFactory;

    protected $primaryKey = 'idAksesMenu';

    protected $fillable = [
        'deskripsi',
        'label',
    ];

    public function Menu() {
        return $this->belongsToMany(Menu::class, 'akses_menus_menus', 'idAksesMenu', 'idMenu');
    }
}
