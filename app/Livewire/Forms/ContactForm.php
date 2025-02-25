<?php

namespace App\Livewire\Forms;

use App\Enums\Gender;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Validation\Rule;
use Livewire\Form;

class ContactForm extends Form
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public int $gender;

    public ?UploadedFile $profile_image = null;

    public ?UploadedFile $additional_file = null;

    public array $customFields = [];

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'integer', Rule::in(Gender::values())],
            'profile_image' => ['nullable', 'image', 'max:1024'],
            'additional_file' => ['nullable', 'file', 'max:2048'],
            'custom_fields' => ['nullable', 'array'],
            'custom_fields.*.id' => ['required', 'integer', 'exists:custom_fields,id'],
            'custom_fields.*.value' => ['required', 'string', 'max:255'],
        ];
    }
}
