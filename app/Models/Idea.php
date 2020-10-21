<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'author_id',
        'overview',
        'items',
        'title',
    ];


    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'id');
    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    public function items(): HasMany
    {
        return $this->hasMany(IdeaItem::class, 'idea_id');
    }
}
