<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @method static find(int $randomId)
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'author_id',
        'idea_id',
        'team_id',
        'items'
    ];


    public function idea()
    {
        return $this->hasOne(Idea::class, 'id', 'idea_id');
    }

    /**
     * @return HasManyThrough
     */
    public function members(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            ProjectMember::class,
            'project_id',
            'id',
            'id',
            'user_id'
        );
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            ProjectProduct::class,
            'project_id',
            'id',
            'id',
            'product_id'
        );
    }

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(ProjectItem::class, 'project_id');
    }


    public function invitations()
    {
        return $this->hasMany(MembershipInvitation::class, 'entity_id')
            ->where(['membership_entity' => 'project']);
    }
}
