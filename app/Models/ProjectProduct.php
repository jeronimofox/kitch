<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectProduct extends Pivot
{
    protected $table = "project_product";
}
