<?php

namespace App\Livewire\Contacts;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact;
use App\Models\CustomField;
use App\Models\CustomFieldModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Livewire\Component;

class Create extends Component
{
    public ContactForm $form;

    public function create(): void
    {
        $valiDatedData = $this->form->validate();

        $this->storeFiles($valiDatedData);

        $contact = Contact::query()->create(Arr::except($valiDatedData, ['custom_fields']));

        $this->storeCustomFields($valiDatedData['custom_fields'], $contact);

        $this->redirectRoute('contacts.index', navigate: true);
    }

    private function storeFiles(array &$valiDatedData): void
    {
        if ($this->form->profile_image) {
            $valiDatedData['profile_image'] = $this->form->profile_image->store('profile_images', 'public');
        }

        if ($this->form->additional_file) {
            $valiDatedData['additional_file'] = $this->form->additional_file->store('additional_files', 'public');
        }
    }

    private function storeCustomFields(array $customFields, Contact $contact): void
    {
        $customFieldModels = [];

        foreach ($customFields as $id => $value) {
            $customFieldModels[] = [
                'model_id' => $contact->id,
                'custom_field_id' => $id,
                'value' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        CustomFieldModel::query()->insert($customFieldModels);
    }

    public function render(): View
    {
        return view('livewire.contacts.create')
            ->with('customFields', CustomField::all())
            ->title('Create contact');
    }
}
