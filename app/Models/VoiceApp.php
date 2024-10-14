<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $app_id
 * @property string $did_id
 * @property string $intl_number
 * @property string $local_number
 * @property string $note
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */

class VoiceApp extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'app_id', 'did_id', 'intl_number','local_number','note'
    ];

}
