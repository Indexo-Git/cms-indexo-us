<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property int $product_id
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, int $productID)
 */
class CategoryProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_product';
}
