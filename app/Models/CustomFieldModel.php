<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CustomFieldModel extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public function customField(): BelongsTo
    {
        return $this->belongsTo(CustomField::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'model_id');
    }
}
