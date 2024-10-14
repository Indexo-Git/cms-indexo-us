<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * @property int $id
 * @property string $name
 *
 * @property Relation $characteristics
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Attribute extends Model
{
    /**
     * Get characteristics related to attribute
     * @return HasMany
     */
    public function characteristics(): HasMany
    {
        return $this->hasMany(Characteristic::class);
    }
}
