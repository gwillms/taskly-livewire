<?php

namespace App\Livewire\Pages\Section;

use App\Livewire\Forms\SectionForm;
use App\Models\Section;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

class SectionPage extends Component
{
    use Toast;
    public SectionForm $form;
    public bool $sectionModal = false;
    public ?int $editingSectionId = null;

    public function save() {
        $this->form->validate();

        if ($this->editingSectionId) {
            $section = Section::find($this->editingSectionId);

            $section->update([
                'setor' => $this->form->setor,
            ]);

            $this->success('Setor atualizado com sucesso');
        } else {
            Section::create([
                'setor' => $this->form->setor,
            ]);

            $this->success('Setor criado com sucesso');
        }

        $this->closeModal();
    }

    #[On('edit-section')]
    public function editSection($sectionId)
    {
        $section = Section::find($sectionId);

        if ($section) {
            $this->editingSectionId = $sectionId;
            $this->form->setor = $section->setor;
            $this->sectionModal = true;
        }
    }

    public function openCreateModal()
    {
        $this->editingSectionId = null;
        $this->form->reset();
        $this->sectionModal = true;
    }

    public function closeModal()
    {
        $this->sectionModal = false;
        $this->editingSectionId = null;
        $this->form->reset();
        $this->dispatch('section-created');
    }

    #[Title('Setor')]
    public function render()
    {
        return view('livewire.pages.section.section-page');
    }
}
