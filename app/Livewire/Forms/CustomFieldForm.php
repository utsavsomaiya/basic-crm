<?php

namespace App\Livewire\Forms;

use App\Enums\CustomFieldType;
use App\Models\CustomField;
use Illuminate\Validation\Rule;
use Livewire\Form;

class CustomFieldForm extends Form
{
    public string $name = '';

    public ?int $type = null;

    public array $options = [];

    public function init(CustomField $customField): void
    {
        $this->fill([
            'name' => $customField->name,
            'type' => $customField->type->value,
            'options' => $customField->options ?? [],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'integer', Rule::in(CustomFieldType::values())],
            'options' => [
                'nullable',
                Rule::requiredIf($this->type === CustomFieldType::OPTIONS->value),
                'array',
            ],
        ];
    }
}
