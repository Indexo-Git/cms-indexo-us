<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $zone_id
 * @property int $state_id
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, int $zoneID)
 */
class StateZone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'state_zone';
}
