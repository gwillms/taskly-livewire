<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table = 'tasks_section';
    protected $fillable = [
        'setor',
        'active',
    ];
}
