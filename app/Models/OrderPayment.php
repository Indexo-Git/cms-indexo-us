<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $order_id
 * @property int $response
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class OrderPayment extends Model
{

    /**
     * The attributes that should be casts.
     *
     * @var array
     */
    protected $casts = [
        'response' => 'array'
    ];
}
