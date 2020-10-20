<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $randomId)
 */
class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "name",
        "description",
        "logo",
        "website_url",
        "github_url",
        "country",
        "created_at",
        "updated_at",
    ];


    public function members()
    {
        return $this->hasManyThrough(
            User::class,
            TeamMember::class,
            'team_id',
            'id',
            'id',
            'user_id');
    }
}
