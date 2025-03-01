<?php

namespace App\Models;

use App\Enums\Gender;
use Database\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    /**
     * @use HasFactory<ContactFactory>
     */
    use HasFactory;

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

    public function mergedInto(): BelongsTo
    {
        return $this->belongsTo(self::class)->with(__FUNCTION__);
    }
}
