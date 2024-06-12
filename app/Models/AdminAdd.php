<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAdd extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'email';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',];
    use HasFactory;
}
