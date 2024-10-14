<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Zone extends Model
{
    /**
     * @return BelongsToMany
     */
    public function states(): BelongsToMany
    {
        return $this->belongsToMany(State::class);
    }
}
