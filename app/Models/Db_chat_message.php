<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Db_chat_message extends Model
{
    use HasFactory;

    protected $table = 'db_chat_messages';

    protected $fillable = ['status'];
}
