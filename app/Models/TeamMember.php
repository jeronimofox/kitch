<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @method static where(array $array)
 */
class TeamMember extends Pivot
{

    protected $table = 'team_member';
}
