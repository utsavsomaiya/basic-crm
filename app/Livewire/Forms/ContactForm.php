<?php

namespace App\Livewire\Forms;

use App\Enums\Gender;
use Illuminate\Validation\Rule;
use Livewire\Form;

class ContactForm extends Form
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public int $gender;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'integer', Rule::in(Gender::values())],
        ];
    }
}
