<?php

namespace App\Livewire\Forms;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public $status_id = 1;
    public $employee_id;
    public $filial_id;
    public $setor_id;
    public $chamado;

    protected function rules()
    {
        return [
            'status_id' => 'required|exists:statuses,id',
            'employee_id' => 'nullable|exists:users,id',
            'filial_id' => 'nullable|exists:branches,id',
            'setor_id' => 'nullable|exists:sections,id',
            'chamado' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'status_id.required' => 'Selecione um status',
            'status_id.exists' => 'Status inválido',
            'employee_id.exists' => 'Colaborador inválido',
            'filial_id.exists' => 'Filial inválida',
            'setor_id.exists' => 'Setor inválido',
            'chamado.required' => 'Descreva o chamado',
            'chamado.min' => 'O chamado deve ter pelo menos 10 caracteres',
        ];
    }
}
