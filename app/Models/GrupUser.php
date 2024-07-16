<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupUser extends Model
{
    use HasFactory;

    protected $primaryKey = 'idGrupUser';

    protected $fillable = [
        'grupUser',
        'idAksesMenu'
    ];

    public function AksesMenu() {
        return $this->hasMany(AksesMenu::class, 'idAksesMenu', 'idGrupUser');
    }

    public function User() {
        return $this->hasMany(User::class, 'idGrupUser');
    }
}
