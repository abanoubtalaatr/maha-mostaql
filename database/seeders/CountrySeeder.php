<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'name' => 'المملكة العربية السعودية',
                ],
            [
                'name' => 'جمهورية مصر العربية',
            ],
            [
                'name' => 'الكويت',
            ],
        ];
        foreach ($countries as $country){
            Country::query()->create($country);
        }
    }
}
