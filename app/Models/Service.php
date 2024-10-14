<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property string $view
 * @property string image
 * @property string $meta_title
 * @property string $meta_description
 * @property int $views
 * @property string $keywords
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, string $url)
 * @method static with(string $string)
 * @method static withCount(\Closure[] $array)
 */
class Service extends Model
{

    /**
     * Get products related to category
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function views(): HasMany
    {
        return $this->hasMany(ServiceView::class, 'service_id');
    }
}
