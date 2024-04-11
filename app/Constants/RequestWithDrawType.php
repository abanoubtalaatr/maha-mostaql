<?php

namespace App\Constants;

class RequestWithDrawType
{
    const PAYPAL = 'paypal';
    const BANK = 'bank';

    public static function all()
    {
        return [
            self::PAYPAL,
            self::BANK,
        ];
    }

    public function getName($type)
    {
        switch ($type) {
            case self::PAYPAL:
                return 'بيبال';
            case self::BANK;
                return 'بنك';
            default:
                return 'Unknown';
        }
    }
}
