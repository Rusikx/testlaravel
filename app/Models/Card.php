<?php

namespace App\Models;

use App\Contracts\Entities\CardContract;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Card extends Model implements CardContract
{
    protected $table = 'cards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = CardContract::FILLABLE_FIELD_LIST;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        if($this->num) {
            return $this->num . ' User: ' . $this->user->fullName;
        } else {
            return 'User: ' . $this->user->fullName;
        }
    }

    public function getCardNumAttribute()
    {
        if($this->num) {
            return self::hideCardChar($this->num);
        } else {
            return '';
        }
    }

    public static function hideCardChar($card)
    {
        $len = strlen($card);
        $str = str_replace(' ', '', $card);
        return substr($str, 0, 4).' '.
            substr($str, 4, 2).str_repeat('*', 2).' '.
            str_repeat('*', 4).' '.
            substr($str, $len - 4, 4);
    }
}
