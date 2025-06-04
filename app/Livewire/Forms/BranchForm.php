<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BranchForm extends Form
{
    #[Validate('required|min:5')]
    public $filial;

    #[Validate('required|max:3')]
    public $sigla;
    protected function rules()
    {
        return [
            'filial' => 'required',
            'sigla' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'filial.required' => 'Digite uma filial',
            'sigla.required' => 'Digite uma sigla',
        ];
    }
}
