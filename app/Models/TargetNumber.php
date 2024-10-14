<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $number
 * @property int $status
 *
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $column, mixed $value)
 */

class TargetNumber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'status'
    ];
}
