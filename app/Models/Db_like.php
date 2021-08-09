<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Db_like extends Model
{
    use HasFactory;

    protected $table = 'db_likes';

    protected $fillable = ['id_from', 'id_to', 'action'];
}
