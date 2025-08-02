<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeForm extends Form
{
    public $nome;
    public $filial_id;
    public $setor_id;

    protected function rules()
    {
        return [
            'nome' => 'required|min:2',
            'filial_id' => 'required|exists:tasks_branch,id',
            'setor_id' => 'required|exists:tasks_section,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Digite um nome',
            'nome.min' => 'O nome deve ter pelo menos 2 caracteres',
            'filial_id.required' => 'Selecione uma filial',
            'filial_id.exists' => 'Filial inválida',
            'setor_id.required' => 'Selecione um setor',
            'setor_id.exists' => 'Setor inválido',
        ];
    }
}
