<?php

namespace App\Livewire\Pages\Section;

use App\Livewire\Forms\SectionForm;
use App\Models\Section;
use Livewire\Component;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

class SectionPage extends Component
{
    use Toast;
    public SectionForm $form;
    public bool $sectionModal = false;

    public function save() {
        $this->form->validate();

        Section::create([
            'setor' => $this->form->setor,
        ]);

        $this->success('Setor criado com sucesso');

        $this->dispatch('section-created');
        $this->form->reset();
        $this->sectionModal = false;
    }

    #[Title('Setor')]
    public function render()
    {
        return view('livewire.pages.section.section-page');
    }
}
