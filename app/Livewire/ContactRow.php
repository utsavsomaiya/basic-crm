<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ContactRow extends Component
{
    public object $loop;

    public Contact $contact;

    public ContactForm $form;

    public function save(): void
    {
        $validatedData = $this->form->validate();

        dd($validatedData);
    }

    public function render(): View
    {
        return view('livewire.contact-row');
    }
}
