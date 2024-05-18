<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'uni_per_id',
        'full_name',
        'password',
        'level',
        'profile_picture',
        'email'
    ];
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
