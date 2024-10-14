<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $description
 * @property string $content
 * @property int $published
 * @property int $views
 * @property int $service_id
 * @property string $image
 * @property int $category_id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $keywords
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, string $url)
 * @method static with(string $string)
 * @method static withCount(\Closure[] $array)
 */
class Post extends Model
{
    /**
     * Get service related to post
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasMany
     */
    public function views(): HasMany
    {
        return $this->hasMany(PostView::class, 'post_id');
    }
}
