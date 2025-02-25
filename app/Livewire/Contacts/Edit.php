<?php

namespace App\Livewire\Contacts;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Edit extends Component
{
    public Contact $contact;

    public ContactForm $form;

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
