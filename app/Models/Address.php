<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $suburb
 * @property string $city
 * @property int $state_id
 * @property int $postal_code
 * @property string $country
 * @property string $rfc
 * @property int $user_id
 * @property bool $main
 * @property State $state
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Address extends Model
{

    /**
     * Return user from address
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return state from address
     * @return HasOne
     */
    public function state(): HasOne
    {
        return $this->hasOne(State::class,'id','state_id');
    }
}
