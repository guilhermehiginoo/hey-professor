<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Database\Eloquent\{Model, Prunable, SoftDeletes};

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Prunable;

    protected $casts = [
        'draft' => 'bool',
    ];

    /**
     * @return HasMany<Vote, $this>
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Define the prunable query for the model.
     *
     * @return Builder<Question>
     */

    public function prunable(): Builder
    {
        return static::where('deleted_at', '<=', now()->subMonth());
    }
}
