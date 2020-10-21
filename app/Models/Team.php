<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @method static find(int $randomId)
 */
class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "logo",
        "website_url",
        "github_url",
        "country",
        "created_at",
        "updated_at",
    ];


    /**
     * get members of the team
     * @return HasManyThrough
     */
    public function members()
    {
        return $this->hasManyThrough(
            User::class,
            TeamMember::class,
            'team_id',
            'id',
            'id',
            'user_id'
        );
    }

    public function invitations()
    {
        return $this->hasMany(MembershipInvitation::class, 'entity_id')
            ->where(['membership_entity' => 'team']);
    }
}
