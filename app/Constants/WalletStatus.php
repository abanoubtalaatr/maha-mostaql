<?php

namespace App\Constants;

class WalletStatus
{
    const PENDING = 1;
    const CAN_DRAW_WIDTH = 2;

    const WITHDRAW_DONE = 3;

    const CHARGE = 4;

    public static function all()
    {
        return [
            self::PENDING,
            self::CAN_DRAW_WIDTH,
            self::WITHDRAW_DONE,
            self::CHARGE
        ];
    }
    public static function getName($type)
    {
        switch ($type) {
            case self::PENDING:
                return 'في انتظار القبول';
            case self::CAN_DRAW_WIDTH;
                return 'يمكنك السحب';
            case self::WITHDRAW_DONE;
                return 'تم السحب';

            default:
                return 'Unknown';
        }
    }
}
