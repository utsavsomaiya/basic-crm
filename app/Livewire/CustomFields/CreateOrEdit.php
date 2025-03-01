<?php

namespace App\Livewire\CustomFields;

use App\Livewire\Forms\CustomFieldForm;
use App\Models\CustomField;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateOrEdit extends Component
{
    public ?CustomField $customField = null;

    public CustomFieldForm $form;

    public function mount(): void
    {
        if ($this->customField) {
            $this->form->init($this->customField);
        }
    }

    public function createOrUpdate(): void
    {
        $validatedData = $this->form->validate();

        if ($this->customField) {
            $this->customField->update($validatedData);
        } else {
            CustomField::query()->create($validatedData);
        }

        $this->redirectRoute('custom_fields.index', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.custom-fields.create-or-edit')
            ->title($this->customField ? $this->customField->name : 'Create custom field');
    }
}
