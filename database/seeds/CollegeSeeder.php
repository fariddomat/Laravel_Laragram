<?php

use App\College;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\College', 10)->create();
        $colleges=['كلية الهندسة المعلوماتية', 'كلية الطب البشري', 'كلية طب الأسنان', 'كلية الصيدلة', 'كلية هندسة الاتصالات', 'كلية إدارة الأعمال', 'كلية الهندسة المعمارية', 'كلية الهندسة المدنية'];
        foreach ($colleges as $key => $college) {
            College::create([
                'name'=>$college
            ]);
        }
    }
}
