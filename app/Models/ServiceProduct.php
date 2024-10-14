<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $service_id
 * @property int $product_id
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, int $productID)
 */
class ServiceProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'service_product';
}
