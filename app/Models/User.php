<?php

namespace App\Models;

use App\Contracts\Entities\UserContract;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Card;
use App\Models\Payment;

class User extends Authenticatable implements UserContract
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = UserContract::FILLABLE_FIELD_LIST;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = UserContract::FIELD_HIDDEN_LIST;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    /**
     * @return HasMany
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getFullNameAttribute()
    {
        if($this->name) {
            return $this->name;
        } else {
            return '';
        }
    }
}
