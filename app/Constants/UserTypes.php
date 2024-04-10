<?php

namespace App\Constants;

class UserTypes
{
    const CLIENT = "client";
    const FREELANCER = "freelancer";

    public static function all()
    {
        return [
            self::CLIENT,
            self::FREELANCER,
        ];
    }

    public static function getName($type)
    {
        switch ($type) {
            case self::CLIENT:
                return 'Client';
            case self::FREELANCER:
                return 'Freelancer';
            default:
                return 'Unknown';
        }
    }
}
