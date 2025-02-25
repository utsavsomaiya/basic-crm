```php
function mergeContacts(Contact $primaryContact, Contact $secondaryContact)
{
    DB::transaction(function () use ($primaryContact, $secondaryContact) {
        $this->storeAsCustomField($primaryContact->id, 'Previous Name', $secondaryContact->name);
        $this->storeAsCustomField($primaryContact->id, 'Previous Email', $secondaryContact->email);

        $secondaryContactCustomFields = DB::table('contact_custom_field')->where('contact_id', $secondaryContact->id)->get();
        foreach ($secondaryContactCustomFields as $field) {
            $existingField = DB::table('contact_custom_field')
                ->where('contact_id', $primaryContact->id)
                ->where('custom_field_id', $field->custom_field_id)
                ->first();

            if (! $existingField) {
                $field->update(['contact_id' => $primaryContact->id]);
            } elseif ($existingField->value !== $field->value) {
                $existingField->update(['value' => $existingField->value.', '.$field->value]);
            }
        }

        $secondaryContact->update([
            'is_merged' => true,
            'merged_into_id' => $primaryContact->id,
        ]);
    });
}
```
