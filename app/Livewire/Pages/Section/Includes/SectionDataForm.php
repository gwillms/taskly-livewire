<?php

namespace App\Livewire\Pages\Section\Includes;

use App\Models\Section;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class SectionDataForm extends Component
{
    use Toast;
    public $selectedSectionId;
    public $showDeleteModal = false;

    #[On('section-created')]
    public function loadSection()
    {
        Section::where('active', 1)->get();
    }
    public function edit($sectionId)
    {
        $this->dispatch('edit-section', sectionId: $sectionId);
    }
    public function confirmDelete($sectionId)
    {
        $this->selectedSectionId = $sectionId;
        $this->showDeleteModal = true;
    }
    public function delete()
    {
        if ($this->selectedSectionId) {
            $section = Section::find($this->selectedSectionId);

            if ($section) {
                $section->delete();

                $this->success('Setor excluído com sucesso');
            }
        }

        $this->showDeleteModal = false;
        $this->selectedSectionId = null;
    }
    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->selectedSectionId = null;
    }
    public function render()
    {
        $section = Section::where('active', 1)
        ->orderBy('setor')
        ->get();

        $headers = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'setor', 'label' => 'Setor'],
            ['key' => 'actions', 'label' => ''],
        ];

        return view('livewire.pages.section.includes.section-data-form', compact('section', 'headers'));
    }
}
