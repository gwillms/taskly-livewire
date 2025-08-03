<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate('required|min:2')]
    public $status;
    protected function rules()
    {
        return [
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Digite um status',
        ];
    }
}
