<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public function getValueOfSetting($key)
    {
        $settings = Setting::query()->where('key', $key)->first();

        if($settings){
            return $settings->value;
        }
        return null;
    }
}
