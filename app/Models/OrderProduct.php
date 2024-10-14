<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $product_id
 * @property int $order_id
 * @property int $quantity
 * @property string $attributes
 * @property float|int|mixed $price
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, int $productID)
 */
class OrderProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_product';

    /**
     * The attributes that should be casts.
     *
     * @var array
     */
    protected $casts = [
        'attributes' => 'array'
    ];

    /**
     * Return product related
     * @return HasOne
     */
    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }
}
