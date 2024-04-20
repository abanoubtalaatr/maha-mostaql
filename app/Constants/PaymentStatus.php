<?php

namespace App\Constants;

class PaymentStatus
{
    const PAID = 'paid';
    const NOT_PAID = 'not paid';

    public static function all()
    {
        return [
            self::PAID,
            self::NOT_PAID,
        ];
    }

    public static function getName($type)
    {
        switch ($type) {
            case self::PAID:
                return 'تم الدفع';
            case self::NOT_PAID:
                return 'لم يتم الدفع';
            default:
                return 'Unknown';
        }
    }
}
