<?php

namespace App\Livewire\Contacts;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Livewire\Component;

class Edit extends Component
{
    public Contact $contact;

    public ContactForm $form;

    public function mount(): void
    {
        abort_if($this->contact->merged_into_id || $this->contact->is_merged, Response::HTTP_FORBIDDEN);

        $this->contact->loadMissing(['mergedContacts.customFields', 'customFields']);
    }

    public function save(): void
    {
        $validatedData = $this->form->validate();

        dd($validatedData);
    }

    public function render(): View
    {
        return view('livewire.contacts.edit')
            ->title($this->contact->name);
    }
}
