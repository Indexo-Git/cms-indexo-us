<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $hash
 * @property string $name
 * @property string $email
 * @property string $password
 * @property boolean $is_admin
 * @property boolean $blocked
 *
 * @property mixed $addresses
 *
 * @method static all()
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'hash'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Ask if the user is admin
     *
     * @return boolean
     */
    public function isAdmin(): bool
    {
        return $this->is_admin; // this looks for an admin column in your users table
    }

    /**
     * Return user orders
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class)->where('status', 1);
    }

    /**
     * Return user orders
     * @return HasOne
     */
    public function cart(): HasOne
    {
        return $this->hasOne(Order::class)->where('cart', 1);
    }

    /**
     * Return user orders
     * @return HasMany
     */
    public function oldOrders(): HasMany
    {
        return $this->hasMany(Order::class)->where('status', 0)->where('cart', 0);
    }

    /**
     * Return user's addresses
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Override reset password notification
     * @param $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

}
