<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{

    protected $table = 'tasks_user';
    protected $fillable = [
        'nome',
        'filial_id',
        'setor_id'
    ];

    public function filial()
    {
        return $this->belongsTo(Branch::class, 'filial_id');
    }

    public function setor()
    {
        return $this->belongsTo(Section::class, 'setor_id');
    }
}
