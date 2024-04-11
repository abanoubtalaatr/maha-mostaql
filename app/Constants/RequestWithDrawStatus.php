<?php

namespace App\Constants;

class RequestWithDrawStatus
{
    const PENDING = 1;
    const COMPLETE = 2;

    public static function all()
    {
        return [
            self::PENDING,
            self::COMPLETE,
        ];
    }
    public static function getName($type)
    {
        switch ($type) {
            case self::PENDING:
                return 'في انتظار القبول';
            case self::COMPLETE;
                return 'مكتمل';
            default:
                return 'Unknown';
        }
    }
}
