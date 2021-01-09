<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<350;$i++){
            $student = Student::factory()->make();
            //echo $student->name.' | '.$student->email.' | '.$student->gender.PHP_EOL;
            $student->save();
        }
    }
}
