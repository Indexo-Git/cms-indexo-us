<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property Zone[] $zones
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 * @method static count()
 * @method whereDoesntHave(string $string)
 * @method static available()
 */
class State extends Model
{

    /**
     * @return BelongsToMany
     */
    public function zones(): BelongsToMany
    {
        return $this->belongsToMany(Zone::class);
    }

    /**
     * Scope to get available states for zones
     * @param $query
     * @return mixed
     */
    public function scopeAvailable($query): mixed
    {
        return $query->doesntHave('zones')->get();
    }
}
