<?php


namespace App\Contracts\Entities;

use App\Contracts\Entities\Helpers\CreatedUpdatedAtContract;

interface UserContract extends CreatedUpdatedAtContract
{
    public const FIELD_ID                 = 'id';
    public const FIELD_NAME               = 'name';
    public const FIELD_EMAIL              = 'email';
    public const FIELD_EMAIL_VERIFIED_AT  = 'email_verified_at';
    public const FIELD_PASSWORD           = 'password';
    public const FIELD_REMEMBER_TOKEN     = 'remember_token';

    public const FIELD_LIST = [
        self::FIELD_ID,
        self::FIELD_NAME,
        self::FIELD_EMAIL,
        self::FIELD_EMAIL_VERIFIED_AT,
        self::FIELD_PASSWORD,
        self::FIELD_REMEMBER_TOKEN,
        self::FIELD_UPDATED_AT,
        self::FIELD_CREATED_AT,
    ];

    public const FILLABLE_FIELD_LIST = [
        self::FIELD_NAME,
        self::FIELD_EMAIL,
        self::FIELD_EMAIL_VERIFIED_AT,
        self::FIELD_PASSWORD,
        self::FIELD_REMEMBER_TOKEN,
        self::FIELD_UPDATED_AT,
        self::FIELD_CREATED_AT,
    ];

    public const FIELD_HIDDEN_LIST = [
        self::FIELD_EMAIL_VERIFIED_AT,
        self::FIELD_PASSWORD,
        self::FIELD_REMEMBER_TOKEN,
    ];
}
