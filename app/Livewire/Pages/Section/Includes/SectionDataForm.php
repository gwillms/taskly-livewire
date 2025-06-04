<?php

namespace App\Livewire\Pages\Section\Includes;

use App\Models\Section;
use Livewire\Attributes\On;
use Livewire\Component;

class SectionDataForm extends Component
{
    #[On('section-created')]
    public function loadSection()
    {
        Section::where('active', 1)->get();
    }
    public function render()
    {
        $section = Section::where('active', 1)->get();

        $headers = [
            ['key' => 'setor', 'label' => 'Setor'],
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'actions', 'label' => ''],
        ];

        return view('livewire.pages.section.includes.section-data-form', compact('section', 'headers'));
    }
}
