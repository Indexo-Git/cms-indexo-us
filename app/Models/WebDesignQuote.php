<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property int $pages
 * @property int $content
 * @property int $forms
 * @property int $seo
 * @property int $e_commerce
 * @property int $invoice
 * @property int $total
 * @property int $views
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */

class WebDesignQuote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'pages', 'content', 'forms', 'seo', 'e_commerce', 'invoice', 'total', 'views'
    ];

}
