<?php

namespace App\Constants;

class ProjectStatus
{
    const REVIEW = 1;
    const OFFERS = 2;
    const IMPLEMENTS = 3;
    const DELIVERY = 4;
    const CLOSED = 5;

    public static function all()
    {
        return [
            self::REVIEW,
            self::OFFERS,
            self::IMPLEMENTS,
            self::DELIVERY,
            self::CLOSED,
        ];
    }

    public static function getName($status)
    {
        switch ($status) {
            case self::REVIEW:
                return 'في المراجعة';
            case self::OFFERS:
                return 'في مرحلة تلقي العروض';
            case self::IMPLEMENTS:
                return 'قيد التنفيذ';
            case self::DELIVERY:
                return 'في مرحلة التسليم';
            case self::CLOSED:
                return 'مغلق';
            default:
                return 'Unknown';
        }
    }
}
