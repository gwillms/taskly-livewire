<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $table = 'tasks_status';
    protected $fillable = [
        'status',
        'active',
    ];
}
