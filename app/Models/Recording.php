<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $app_hash
 * @property string $app_name
 * @property string $callid
 * @property string $cli_name
 * @property string $cli_number
 * @property string $date
 * @property string $date_read
 * @property string $did_hash
 * @property string $did_intl_number
 * @property string $did_local_number
 * @property int $duration
 * @property int $file_size_total
 * @property string $hash
 * @property string $options
 * @property int $status_read
 * @property string $status
 * @property string $type
 * @property string $url
 * @property string $url_exts
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 * @method static create(array $param)
 */

class Recording extends Model
{
    /**
     * Get call related to recording
     * @return BelongsTo
     */
    public function call(): BelongsTo
    {
        return $this->belongsTo(Call::class, 'callid_in', 'callid');
    }
}
