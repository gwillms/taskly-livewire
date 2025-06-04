<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required|min:3')]
    public $nome;
    #[Validate('required')]
    public $filial_id;
    #[Validate('required')]
    public $setor_id;
    protected function rules()
    {
        return [
            'nome' => 'required',
            'filial_id' => 'required',
            'setor_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Digite um status',
            'filial_id.required' => 'Selecione uma filial',
            'setor_id.required' => 'Selecione um setor',
        ];
    }
}
