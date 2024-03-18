<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            [
                'name' => 'اعمال وخدمات استشارية'
            ],
            [
                'name' => 'برمجة، وتطوير المواقع والتطبيقات'
            ],
            [
                'name' => 'هندسة، عمارة وتصميم داخلي'
            ],
            [
                'name' => 'تصميم، فيديو وصوتيات'
            ],
            [
                'name' => 'تسويق الكتروني ومبيعات'
            ],
            [
                'name' => 'كتابة، تحرير، ترجمة ولغات'
            ],
            [
                'name' => 'دعم، مساعدة وادخال بيانات '
            ],
            [
                'name' => 'تدريب وتعليم عن بعد'
            ],
        ];

        foreach ($specialities as $speciality){
            Specialty::query()->create($speciality);
        }
    }
}
