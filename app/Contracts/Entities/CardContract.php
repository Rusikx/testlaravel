<?php


namespace App\Contracts\Entities;

use App\Contracts\Entities\Helpers\CreatedUpdatedAtContract;

interface CardContract extends CreatedUpdatedAtContract
{
    public const FIELD_ID       = 'id';
    public const FIELD_USER_ID  = 'user_id';
    public const FIELD_NUM      = 'num';
    public const FIELD_EXPIRES  = 'expires';
    public const FIELD_CVC      = 'cvc';

    public const FIELD_LIST = [
        self::FIELD_ID,
        self::FIELD_USER_ID,
        self::FIELD_NUM,
        self::FIELD_EXPIRES,
        self::FIELD_CVC,
        self::FIELD_UPDATED_AT,
        self::FIELD_CREATED_AT,
    ];

    public const FILLABLE_FIELD_LIST = [
        self::FIELD_USER_ID,
        self::FIELD_NUM,
        self::FIELD_EXPIRES,
        self::FIELD_CVC,
        self::FIELD_UPDATED_AT,
        self::FIELD_CREATED_AT,
    ];
}
