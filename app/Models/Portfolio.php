<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $client
 * @property string $date
 * @property string $skills
 * @property string $location
 * @property string $url
 * @property int $views
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, string $url)
 */
class Portfolio extends Model
{
}
