<?php

namespace App\Livewire\Pages\Employee;

use App\Livewire\Forms\EmployeeForm;
use App\Models\Branch;
use App\Models\Section;
use App\Models\UserModel;
use Livewire\Component;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

class EmployeePage extends Component
{
    use Toast;
    public EmployeeForm $form;
    public bool $employeeModal = false;
    public $setorList = [];
    public $filialList = [];

    public function mount() {
        $this->setorList = Section::where('active', true)
            ->orderBy('setor')
            ->get()
            ->map(fn($item) => (object) [
                'id' => $item->id,
                'name' => $item->setor,
            ])
            ->values();

        $this->filialList = Branch::where('active', true)
            ->orderBy('filial')
            ->get()
            ->map(fn($item) => (object) [
                'id' => $item->id,
                'name' => $item->filial,
            ])
            ->values();
    }

    public function save() {
        $this->form->validate();

        UserModel::create([
            'nome' => $this->form->nome,
            'filial_id' => $this->form->filial_id,
            'setor_id' => $this->form->setor_id,
        ]);

        $this->success('Colaborador criado com sucesso');

        $this->dispatch('employee-created');
        $this->form->reset();
        $this->employeeModal = false;
    }

    #[Title('Colaborador')]
    public function render()
    {
        return view('livewire.pages.employee.employee-page');
    }
}
