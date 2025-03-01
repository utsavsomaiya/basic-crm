<?php

namespace App\Livewire\CustomFields;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Create extends Component
{
    public function render(): View
    {
        return view('livewire.custom-fields.create')->title('Create custom field');
    }
}
