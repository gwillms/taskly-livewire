<?php

namespace App\Livewire\Pages\Status\Includes;

use App\Models\Status;
use Livewire\Attributes\On;
use Livewire\Component;

class StatusDataForm extends Component
{
    #[On('status-created')]
    public function loadSection()
    {
        Status::where('active', 1)->get();
    }
    public function render()
    {
        $status = Status::where('active', 1)->get();

        $headers = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'status', 'label' => 'Status'],
            ['key' => 'actions', 'label' => ''],
        ];

        return view('livewire.pages.status.includes.status-data-form', compact('status', 'headers'));
    }
}
