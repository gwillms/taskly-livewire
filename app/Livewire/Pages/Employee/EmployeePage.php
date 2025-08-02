<?php

namespace App\Livewire\Pages\Employee;

use App\Livewire\Forms\EmployeeForm;
use App\Livewire\Forms\UserForm;
use App\Models\Branch;
use App\Models\Section;
use App\Models\UserModel;
use Livewire\Attributes\On;
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
    public ?int $editingEmployeeId = null;

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

        if ($this->editingEmployeeId) {
            $employee = UserModel::find($this->editingEmployeeId);

            $employee->update([
                'nome' => $this->form->nome,
                'filial_id' => $this->form->filial_id,
                'setor_id' => $this->form->setor_id,
            ]);

            $this->success('Colaborador atualizado com sucesso');
        } else {
            UserModel::create([
                'nome' => $this->form->nome,
                'filial_id' => $this->form->filial_id,
                'setor_id' => $this->form->setor_id,
            ]);

            $this->success('Colaborador criado com sucesso');
        }

        $this->closeModal();
    }

    #[On('edit-employee')]
    public function editEmployee($employeeId)
    {
        $employee = UserModel::find($employeeId);

        if ($employee) {
            $this->editingEmployeeId = $employeeId;
            $this->form->nome = $employee->nome;
            $this->form->setor_id = $employee->setor_id;
            $this->form->filial_id = $employee->filial_id;
            $this->employeeModal = true;
        }
    }

    public function openCreateModal()
    {
        $this->editingEmployeeId = null;
        $this->form->reset();
        $this->employeeModal = true;
    }

    public function closeModal()
    {
        $this->employeeModal = false;
        $this->editingEmployeeId = null;
        $this->form->reset();
        $this->dispatch('employee-created');
    }

    #[Title('Colaborador')]
    public function render()
    {
        return view('livewire.pages.employee.employee-page');
    }
}
