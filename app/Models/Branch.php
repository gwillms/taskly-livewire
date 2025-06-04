<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    protected $table = 'tasks_branch';
    protected $fillable = [
        'filial',
        'sigla',
        'active',
    ];
}
