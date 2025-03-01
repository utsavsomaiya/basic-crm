<?php

namespace Database\Seeders;

use App\Enums\CustomFieldType;
use App\Models\Contact;
use App\Models\CustomField;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $customFields = CustomField::factory()
            ->forEachSequence(
                ['name' => 'Birthday', 'type' => CustomFieldType::DATE],
                ['name' => 'Company Name', 'type' => CustomFieldType::TEXT],
                ['name' => 'Address', 'type' => CustomFieldType::TEXTAREA],
            )
            ->create();

        Contact::factory(100)
            ->hasAttached($customFields[0], ['value' => today()->toDateString()])
            ->hasAttached($customFields[1], ['value' => fake()->company()])
            ->hasAttached($customFields[2], ['value' => fake()->address()])
            ->create();
    }
}
