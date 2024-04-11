<?php

namespace App\Constants;

class WalletType
{
    const CHARGE = 1;
    const DRAW_WIDTH = 2;
    const PROJECT_FEE = 3;


    public static function all()
    {
        return [
            self::CHARGE,
            self::DRAW_WIDTH,
            self::PROJECT_FEE
        ];
    }

    public static function getName($type)
    {
        switch ($type) {
            case self::CHARGE:
                return 'شحن';
            case self::DRAW_WIDTH:
                return 'سحب';
            case self::PROJECT_FEE;
                return 'مستحقات من تنفيذ مشروع';

            default:
                return 'Unknown';
        }
    }
}
