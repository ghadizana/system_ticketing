<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupUser extends Model
{
    use HasFactory;

    protected $primaryKey = 'idGrupUser';

    protected $fillable = [
        'idGrupUser',
        'grupUser'
    ];
}
