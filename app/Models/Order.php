<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $hash
 * @property int $user_id
 * @property string $session_id
 * @property int $shipping_id
 * @property int $billing_id
 * @property float $subtotal
 * @property float $total
 * @property int $invoice
 * @property int $cart
 * @property int $seen
 * @property int $status
 * @property string $charge_id
 * @property mixed $details
 * @property Address $shipping
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 * @method static cart(int|string|null $id)
 */
class Order extends Model
{
    /**
     * Get user related to order
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get products related to order
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get order products relations
     * @return HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * Get order related payments
     * @return HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * Get order shipping address
     * @return HasOne
     */
    public function shipping(): HasOne
    {
        return $this->hasOne(Address::class,'id','shipping_id');
    }

    /**
     * Get order billing address
     * @return HasOne
     */
    public function billing(): HasOne
    {
        return $this->hasOne(Address::class,'id','billing_id');
    }

    /**
     * Get order related notes
     * @return HasMany
     */
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    /**
     * Get orders still in cart status from user
     * @param Builder $query
     * @param mixed $id
     * @return Builder
     */
    public function scopeCart(Builder $query, mixed $id): Builder
    {
        return $query
            ->where('cart', 1)
            ->where(function($query) use ($id){
                $query->where('user_id', $id)
                    ->orWhere('session_id', $id);
            });
    }

    /**
     * Get all orders still in cart status
     * @param Builder $query
     * @return Builder
     */
    public function scopeCarts(Builder $query): Builder
    {
        return $query->where('cart', 1);
    }

    /**
     * Get active paid orders
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query
            ->where('status', '!=', 0);
    }

}
