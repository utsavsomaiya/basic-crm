<?php

namespace App\Models;

use App\Enums\Gender;
use Database\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    /**
     * @use HasFactory<ContactFactory>
     */
    use HasFactory;

    use SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'gender' => Gender::class,
            'is_merged' => 'boolean',
        ];
    }

    public function mergedContacts(): HasMany
    {
        return $this->hasMany(self::class, 'merged_into_id')->with(__FUNCTION__);
    }

    public function mergedInto(): BelongsTo
    {
        return $this->belongsTo(self::class)->with(__FUNCTION__);
    }

    public function customFields(): BelongsToMany
    {
        return $this->belongsToMany(CustomField::class, 'custom_field_model', 'model_id')
            ->using(CustomFieldModel::class)
            ->withPivot(['value'])
            ->withTimestamps();
    }
}
