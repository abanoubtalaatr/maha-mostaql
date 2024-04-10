<?php

namespace App\Constants;

class ProposalStatus
{
    const WAITING = 1;
    const ACCEPT = 2;
    const EXCLUDED = 3;
    const DONE = 4;

    public static function all()
    {
        return [
            self::WAITING,
            self::ACCEPT,
            self::EXCLUDED,
            self::DONE
        ];
    }

    public static function getName($status)
    {
        switch ($status) {
            case self::WAITING:
                return 'في انتظار القبول';
            case self::ACCEPT:
                return 'مقبول';
            case self::EXCLUDED:
                return 'مستبعد';
            case self::DONE:
                return 'مكتمل';
            default:
                return 'Unknown';
        }
    }
}
