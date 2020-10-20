<?php
/** @noinspection PhpMissingFieldTypeInspection */
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @method static where(array $array)
 */
class TeamMember extends Pivot
{

    protected $table = 'team_member';
}
