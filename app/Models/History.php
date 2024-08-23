<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $commit
 * @property mixed $histories
 * @property mixed $user
 */
class History extends Model
{
    use HasFactory;

    protected $table = 'histories';
    protected $fillable = [
        'commit'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uid', 'id');
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }
}
