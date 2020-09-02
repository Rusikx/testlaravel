<?php


namespace App\Contracts\Entities;

use App\Contracts\Entities\Helpers\CreatedUpdatedAtContract;

interface PaymentContract extends CreatedUpdatedAtContract
{
    public const FIELD_ID          = 'id';
    public const FIELD_SUM         = 'sum';
    public const FIELD_USER_ID     = 'user_id';
    public const FIELD_CARD_ID     = 'card_id';
    public const FIELD_CODE        = 'code';
    public const FIELD_PAYMENT_AT  = 'payment_at';
    public const FIELD_STATUS      = 'status';

    public const STATUS_CREATED = 0;
    public const STATUS_SUCCESS = 1;
    public const STATUS_PROCESS = 2;
    public const STATUS_FAIL    = 3;

    public const STATUS_LIST = [
        self::STATUS_CREATED => 'created',
        self::STATUS_SUCCESS => 'success',
        self::STATUS_PROCESS => 'process',
        self::STATUS_FAIL    => 'error',
    ];

    public const FIELD_LIST = [
        self::FIELD_ID,
        self::FIELD_SUM,
        self::FIELD_USER_ID,
        self::FIELD_CARD_ID,
        self::FIELD_CODE,
        self::FIELD_PAYMENT_AT,
        self::FIELD_STATUS,
        self::FIELD_UPDATED_AT,
        self::FIELD_CREATED_AT,
    ];

    public const FILLABLE_FIELD_LIST = [
        self::FIELD_SUM,
        self::FIELD_USER_ID,
        self::FIELD_CARD_ID,
        self::FIELD_CODE,
        self::FIELD_PAYMENT_AT,
        self::FIELD_STATUS,
        self::FIELD_UPDATED_AT,
        self::FIELD_CREATED_AT,
    ];
}
