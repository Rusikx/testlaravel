<?php

namespace App\Models;

use App\Contracts\Entities\PaymentContract;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Card;

class Payment extends Model implements PaymentContract
{
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = PaymentContract::FILLABLE_FIELD_LIST;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function getStatusTextAttribute()
    {
        return PaymentContract::STATUS_LIST[$this->status];
    }
}
