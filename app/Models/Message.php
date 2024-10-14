<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $subject
 * @property string $content
 * @property int $type
 * @property int $status_read
 * @property int $trash
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */

class Message extends Model
{
    //
}
