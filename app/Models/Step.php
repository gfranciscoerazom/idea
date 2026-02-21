<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Step extends Model
{
    /** @use HasFactory<\Database\Factories\StepFactory> */
    use HasFactory;

    /**
     * The attributes that should have default values.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'completed' => false,
    ];

    /**
     * Get the idea that owns the step.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idea(): BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }
}
