<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Db_chat extends Model
{
    use HasFactory;

    protected $table = 'db_chat';

    protected $fillable = ['user_one', 'user_two'];
}
