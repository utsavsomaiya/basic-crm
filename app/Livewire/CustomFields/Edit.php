<?php

namespace App\Livewire\CustomFields;

use App\Models\CustomField;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Edit extends Component
{
    public CustomField $customField;

    public function render(): View
    {
        return view('livewire.custom-fields.edit')
            ->title($this->customField->name);
    }
}
