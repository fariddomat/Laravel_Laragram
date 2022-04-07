<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\Course', 50)->create();
        $courses=['رياضيات 1', 'رياضيات 2', 'لغة انكليزية 1', 'لغة إانكليزية 2', 'حاسوب', 'أساسيات'];
        for ($i=1; $i <= 8; $i++) {
            foreach ($courses as $key => $value) {
                Course::create([
                    'name'=>$value,
                    'college_id'=>$i
                ]);
            }
        }
    }
}
