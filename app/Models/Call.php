<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $answer
 * @property string $billing_customer_cost_label
 * @property string $billing_customer_credit_eur
 * @property string $billing_customer_debit_eur
 * @property string $callid
 * @property string $callid_in
 * @property string $cli_name
 * @property string $cli_number
 * @property string $cli_pre
 * @property string $dialstatus
 * @property int $duration
 * @property int $duration_answered
 * @property int $duration_billed
 * @property string $hangup
 * @property int $hangupcause
 * @property string $hangupsource
 * @property string $number
 * @property string $number_country_code
 * @property string $number_type
 * @property string $package_name
 * @property string $scenario_name
 * @property string $scenario_hash
 * @property string $start
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 * @method static create(array $param)
 */
class Call extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'answer',
        'billing_customer_cost_label',
        'billing_customer_credit_eur',
        'billing_customer_debit_eur',
        'callid',
        'callid_in',
        'cli_name',
        'cli_number',
        'cli_pres',
        'dialstatus',
        'duration',
        'duration_answered',
        'duration_billed',
        'hangup',
        'hangupcause',
        'hangupsource',
        'number',
        'number_country_code',
        'number_type',
        'package_name',
        'scenario_name',
        'scenario_hash',
        'start'
    ];

    /**
     * Get recording related to call
     * @return HasOne
     */
    public function recording(): HasOne
    {
        return $this->hasOne(Recording::class, 'callid', 'callid_in');
    }
}
