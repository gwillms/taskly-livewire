<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SectionForm extends Form
{
    #[Validate('required|min:2')]
    public $setor;
    protected function rules()
    {
        return [
            'setor' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'setor.required' => 'Digite um setor',
        ];
    }
}
