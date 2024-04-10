<?php

namespace App\Constants;

class RequestDeliverStatus
{
    const PENDING = 1;
    const ACCEPT = 2;
    const REJECT = 3;

    public static function all()
    {
        return [
            self::PENDING,
            self::ACCEPT,
            self::REJECT,
        ];
    }

    public static function getName($status)
    {
        switch ($status) {
            case self::PENDING:
                return 'في انتظار القبول';
            case self::ACCEPT:
                return 'مقبول';
            case self::REJECT:
                return 'مستبعد';
            default:
                return 'Unknown';
        }
    }
}
