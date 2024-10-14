<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $product_id
 * @property int $characteristic_id
 * @property int $stock
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, int $productID)
 */
class CharacteristicProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'characteristic_product';
}
