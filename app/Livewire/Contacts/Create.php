<?php

namespace App\Livewire\Contacts;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact;
use App\Models\CustomField;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Create extends Component
{
    public ContactForm $form;

    public function create(): void
    {
        $valiDatedData = $this->form->validate();

        $this->storeFiles($valiDatedData);
        $this->storeCustomFields($valiDatedData);

        Contact::query()->create($valiDatedData);

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

    private function storeCustomFields(array &$valiDatedData): void
    {
        foreach ($this->form->customFields as $customField) {
            // Store into database!
        }
    }

    public function render(): View
    {
        return view('livewire.contacts.create')
            ->with('customFields', CustomField::all())
            ->title('Create contact');
    }
}
