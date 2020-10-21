<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Str;

/**
 * @method static find($invitationId)
 * @method static where(array $array)
 * @property mixed target_id
 * @property mixed sender_id
 * @property mixed project_id
 * @property mixed team_id*
 * @property mixed membership_entity
 */
class MembershipInvitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity_id',
        'membership_entity',
        'sender_id',
        'target_id',
        'has_accepted'
    ];


    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'entity_id');
    }

    /**
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'entity_id');
    }


    public function entity()
    {
        return $this->belongsTo(
            "App\Models\\" . Str::title($this->membership_entity) . 'Member',
            'entity_id'
        );
    }


    public function target()
    {
        return $this->hasOne(User::class, 'id', 'target_id');
    }


    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }
}
