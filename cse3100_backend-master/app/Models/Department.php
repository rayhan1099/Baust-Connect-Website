<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Model
 */
class Department extends Model
{
    protected $hidden = ["updated_at","created_at"];
    protected $fillable = ["name_short","name", "description", "birth_date", "icon","backdrop","external_link"];
    protected $casts = [
        'birth_date'=>'datetime'
    ];
    use HasFactory;
}
