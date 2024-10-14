<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * Properties
 * @property int $id
 * @property string $sku
 * @property string $name
 * @property string $description
 * @property string $url
 * @property float $regular_price
 * @property float $sale_price
 * @property bool $stock_management
 * @property int $stock_status
 * @property bool $sold_individually
 * @property bool $virtual
 * @property bool $new
 * @property bool $featured
 * @property float $width
 * @property float $height
 * @property float $length
 * @property float $weight
 * @property int $views
 * @property bool $hidden
 * @property string $meta_title
 * @property string $meta_description
 * @property string $keywords
 * @property string $extra
 *
 * Relations
 * @property Relation $categories
 * @property Relation $characteristics
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $column, $operatorOrValue)
 */
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Check if attribute is related to product
     * @param Attribute $attribute
     * @return Collection
     */
    public function attributes(Attribute $attribute): Collection
    {
        return $this->characteristics()->whereBelongsTo($attribute)->get();
    }

    /**
     * Get categories related to product
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get characteristics related to product
     * @return BelongsToMany
     */
    public function characteristics(): BelongsToMany
    {
        return $this->belongsToMany(Characteristic::class)->withPivot('stock');
    }

    /**
     * Get orders related to product
     * @return BelongsToMany
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->where('status',1);
    }

    /**
     * Get sent orders related to product
     * @return BelongsToMany
     */
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * Get product order relations
     * @return HasMany
     */
    public function ordersRelation(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * Return product's reviews
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get visible products
     *
     * @param $query
     * @return mixed
     */
    public function scopeVisible($query): mixed
    {
        return $query->where('hidden',0)->get();
    }

    /**
     * Get hidden products
     *
     * @param $query
     * @return mixed
     */
    public function scopeHidden($query): mixed
    {
        return $query->where('hidden',1)->get();
    }

    /**
     * Get available products (in case are unique products)
     * @param $query
     * @return mixed
     */
    public function scopeActive($query): mixed
    {
        return $query->where('sold',0)->where('stock-individually')->get();
    }

    /**
     * Get sold products (in case are unique products)
     * @param $query
     * @return mixed
     */
    public function scopeSold($query): mixed
    {
        return $query->where('sold',1)->get();
    }

    /**
     * Get products by category
     * @param $query
     * @param int $cat
     * @return mixed
     */
    public function scopeCategory($query,int $cat): mixed
    {
        return $query->where('category_id', $cat)->where('sold',0)->get();
    }

    /**
     * Get products by user
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeUser($query,$id): mixed
    {
        return $query->where('user_id', $id)->get();
    }
}
