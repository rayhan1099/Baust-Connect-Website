<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactChannel extends Model
{
    use HasFactory;
    protected $fillable = [
        'require_permission',
        'student_id',
        'channel_data',
        'type',
    ];
    protected $hidden = [
        'require_permission',
        'created_at',
        'updated_at',
    ];
}
