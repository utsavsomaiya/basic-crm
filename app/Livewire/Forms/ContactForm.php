<?php

namespace App\Livewire\Forms;

use App\Enums\Gender;
use App\Models\CustomField;
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

    public array $custom_fields = [];

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'integer', Rule::in(Gender::values())],
            'profile_image' => ['nullable', 'image', 'max:1024'],
            'additional_file' => ['nullable', 'file', 'max:2048'],
            'custom_fields' => ['nullable', 'array:'.CustomField::query()->pluck('id')->implode(',')],
            'custom_fields.*' => ['required', 'string', 'max:255'],
        ];
    }
}
