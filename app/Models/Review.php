<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property float $rate
 * @property string $content
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Review extends Model
{

}
