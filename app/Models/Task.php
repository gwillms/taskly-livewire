<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks_task';
    protected $fillable = [
        'status_id',
        'setor_id',
        'filial_id',
        'employee_id',
        'chamado',
        'anexo',
        'active',
    ];

    protected $casts = [
        'anexo' => AsCollection::class,
        'active' => 'boolean',
    ];
}
