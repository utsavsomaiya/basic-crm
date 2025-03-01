<?php

namespace App\Livewire\CustomFields;

use App\Models\CustomField;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Index extends Component
{
    public function render(): View
    {
        return view('livewire.custom-fields.index')
            ->with('customFields', CustomField::query()->select('id', 'name', 'type')->get())
            ->title('Custom fields');
    }
}
