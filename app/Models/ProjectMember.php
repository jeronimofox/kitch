<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @method static where(array $array)
 */
class ProjectMember extends Pivot
{
    protected $table = "project_member";
}
