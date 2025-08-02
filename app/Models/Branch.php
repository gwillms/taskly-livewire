<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    protected $table = 'tasks_branch';
    protected $fillable = [
        'filial',
        'sigla',
        'estado',
        'active',
    ];

    protected $estadoList = [
        1 => 'Mato Grosso',
        2 => 'Paraná',
        3 => 'Rio Grande do Sul',
        4 => 'Santa Catarina',
    ];

    public function getEstadoNomeAttribute()
    {
        return $this->estadoList[$this->estado];
    }
}
